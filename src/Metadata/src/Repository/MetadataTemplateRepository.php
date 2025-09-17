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
}