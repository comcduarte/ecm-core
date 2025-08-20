<?php
declare(strict_types=1);

namespace Core\Metadata\Repository;

use Core\App\Repository\AbstractRepository;
use Core\Metadata\Entity\MetadataTemplate;
use Dot\DependencyInjection\Attribute\Entity;
use comcduarte\Box\API\AccessTokenAwareTrait;
use comcduarte\Box\API\Resource\MetadataTemplates;

#[Entity(name: MetadataTemplate::class)]
class MetadataTemplateRepository extends AbstractRepository
{
    use AccessTokenAwareTrait;
    
    public function getMetadataTemplates(array $params,array $filters = []): MetadataTemplates
    {
        
        $global = [
            'app_folder_id'     => '335486073328',
            'limit'             => 15,
            'scope'             => 'enterprise_1328932288',
        ];
        
        /**
         * Set Local Variables
         */
        $app_folder_id = $global['app_folder_id'];
        
        $metadata_template = new \comcduarte\Box\API\Resource\MetadataTemplate($params['access_token']->getAccessToken());
        $templates = $metadata_template->list_all_metadata_templates_for_enterprise();
        return $templates;
    }
}