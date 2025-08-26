<?php
declare(strict_types = 1);
namespace Core\Metadata\Repository;

use Core\App\Repository\AbstractRepository;
use Core\Metadata\Entity\MetadataTemplate;
use Dot\DependencyInjection\Attribute\Entity;
use comcduarte\Box\API\AccessToken;
use comcduarte\Box\API\AccessTokenAwareTrait;
use comcduarte\Box\API\Exception\ClientErrorException;
use comcduarte\Box\API\Resource\ClientError;
use comcduarte\Box\API\Resource\MetadataTemplates;

#[Entity(name: MetadataTemplate::class)]
class MetadataTemplateRepository extends AbstractRepository
{
    use AccessTokenAwareTrait;

    public function getMetadataTemplates(array $params, array $filters = []): MetadataTemplates
    {
        $metadata_template = new \comcduarte\Box\API\Resource\MetadataTemplate($params['access_token']->getAccessToken());
        $templates = $metadata_template->list_all_metadata_templates_for_enterprise();
        return $templates;
    }

    public function saveMetadataTemplate(array $params)
    {
        $template = new \comcduarte\Box\API\Resource\MetadataTemplate($params['access_token']->getAccessToken());

        $template->copyInstanceOnItemCopy = $params['copyInstanceOnItemCopy'];
        $template->displayName = $params['displayName'];

        $fields = [];

        foreach ($params['fields'] as $field) {
            $fields[] = $field;
        }

        $template->fields = $fields;
        $template->hidden = $params['hidden'];
        $template->scope = $params['scope'];
        $template->templateKey = $params['templateKey'];

        $result = $template->create_metadata_template();

        if ($result instanceof ClientError) {
            throw new ClientErrorException();
        } elseif ($result instanceof \comcduarte\Box\API\Resource\MetadataTemplate) {
            return $result;
        }
    }

    public function deleteMetadataTemplate(string $template_key, AccessToken $access_token): void
    {
        $template = new \comcduarte\Box\API\Resource\MetadataTemplate($access_token->getAccessToken());
        $template->remove_metadata_template('enterprise', $template_key);
        return;
    }
}