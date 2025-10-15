<?php
declare(strict_types=1);

namespace Core\Metadata\Repository;

use Core\App\Repository\AbstractRepository;
use Core\Metadata\Entity\MetadataTemplate as MetadataTemplateEntity;
use Dot\DependencyInjection\Attribute\Entity;
use comcduarte\Box\API\AccessToken;
use comcduarte\Box\API\AccessTokenAwareTrait;
use comcduarte\Box\API\Enum\FieldType;
use comcduarte\Box\API\Exception\ClientErrorException;
use comcduarte\Box\API\Resource\ClientError;
use comcduarte\Box\API\Resource\Field;
use comcduarte\Box\API\Resource\MetadataInstance;
use comcduarte\Box\API\Resource\MetadataTemplate;
use comcduarte\Box\API\Resource\MetadataTemplates;

#[Entity(name: MetadataTemplateEntity::class)]
class MetadataTemplateRepository extends AbstractRepository
{
    use AccessTokenAwareTrait;
    
    public function getMetadataTemplates(array $params, AccessToken $access_token): MetadataTemplates
    {
        $metadata_template = new \comcduarte\Box\API\Resource\MetadataTemplate($access_token->getAccessToken());
        $templates = $metadata_template->list_all_metadata_templates_for_enterprise();
        return $templates;
    }
    
    public function getMetadataTemplate(array $params, AccessToken $access_token)
    {
        $metadata_template = new MetadataTemplate($access_token);
        
        $scope = $params['scope'];
        $template_key = $params['template_key'];
        
        $result = $metadata_template->get_metadata_template_by_name($scope, $template_key);
        if ($result instanceof ClientError) {
            throw new ClientErrorException($result->message);
        }
        
        return $metadata_template;
    }
    
    public function createMetadataTemplate(array $params, AccessToken $access_token): MetadataTemplate
    {
        $template = new MetadataTemplate($access_token->getAccessToken());
        $template->exchangeArray($params);
        $object = $template->create_metadata_template();
        
        if ($object instanceof ClientError) {
            /**
             * @var ClientError $object
             */
            throw new ClientErrorException($object->message);
        }
        
        return $object;
    }
    
    public function saveMetadataTemplate(array $params, AccessToken $access_token)
    {
        $template = new MetadataTemplate($access_token->getAccessToken());

        $template->displayName = $params['displayName'];
        $template->templateKey = $params['displayName'];
        
        $field = new Field();
        $field->displayName = 'testfield';
        $field->type = FieldType::Text;
        
        $template->fields = [
            $field,
        ];
        
        $result = $template->create_metadata_template();
        
        if ($result instanceof ClientError) {
            throw new ClientErrorException();
        } elseif ($result instanceof \comcduarte\Box\API\Resource\MetadataTemplate) {
            return $result;
        }
        
    }
    
    public function deleteMetadataTemplate(string $template_key, AccessToken $access_token): void
    {
        $template = new MetadataTemplate($access_token->getAccessToken());
        $template->remove_metadata_template('enterprise', $template_key);
        return;
    }

    public function updateMetadataTemplate(MetadataTemplate $template, AccessToken $access_token): void
    {
        $template->update_metadata_template();
        return;
    }
    
    public function applyMetadataInstance(array $params, AccessToken $access_token): bool
    {
        $instance = new MetadataInstance($access_token);
        
        $scope = $params['scope'];
        $template_key = $params['template_key'];
        $data = json_decode($params['data'], TRUE);
        
        if (isset($params['folder_id'])) {
            $folder_id = $params['folder_id'];
            $result = $instance->create_metadata_instance_on_folder($folder_id, $scope, $template_key, $data);
        } elseif (isset($params['file_id'])) {
            $file_id = $params['file_id'];
            $result = $instance->create_metadata_instance_on_file($file_id, $scope, $template_key, $data);
        }
        
        if ($result instanceof ClientError) {
            throw new ClientErrorException($result->message);
        }
        
        return true;
    }
    
    public function removeMetadataInstance(array $params, AccessToken $access_token): bool
    {
        $instance = new MetadataInstance($access_token);
        
        $scope = $params['scope'];
        $template_key = $params['template_key'];
        
        if (isset($params['folder_id'])) {
            $folder_id = $params['folder_id'];
            $result = $instance->remove_metadata_instance_from_folder($folder_id, $scope, $template_key);
        } elseif (isset($params['file_id'])) {
            $file_id = $params['file_id'];
            $result = $instance->remove_metadata_instance_from_file($file_id, $scope, $template_key);
        }
        
        if ($result instanceof ClientError) {
            throw new ClientErrorException($result->message);
        }
        
        return true;
    }
    
    public function updateMetadataInstance(array $params, AccessToken $access_token): bool
    {
        $instance = new MetadataInstance($access_token);
        
        $scope = $params['scope'];
        $template_key = $params['template_key'];
        $data = json_decode($params['data'], TRUE);
        
        if (isset($params['folder_id'])) {
            $folder_id = $params['folder_id'];
            $result = $instance->update_metadata_instance_on_folder($folder_id, $scope, $template_key, $data);
        } elseif (isset($params['file_id'])) {
            $file_id = $params['file_id'];
            $result = $instance->update_metadata_instance_on_file($file_id, $scope, $template_key, $data);
        }
        
        if ($result instanceof ClientError) {
            throw new ClientErrorException($result->message);
        }
        
        return true;
    }
}