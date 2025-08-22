<?php
declare(strict_types=1);

namespace Core\Metadata\Repository;

use Core\App\Repository\AbstractRepository;
use Core\Metadata\Entity\MetadataTemplate;
use Dot\DependencyInjection\Attribute\Entity;
use comcduarte\Box\API\AccessTokenAwareTrait;
use comcduarte\Box\API\Exception\ClientErrorException;
use comcduarte\Box\API\Resource\ClientError;
use comcduarte\Box\API\Resource\Field;
use comcduarte\Box\API\Resource\MetadataTemplates;
use comcduarte\Box\API\AccessToken;

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
//         $app_folder_id = $global['app_folder_id'];
        
        $metadata_template = new \comcduarte\Box\API\Resource\MetadataTemplate($params['access_token']->getAccessToken());
        $templates = $metadata_template->list_all_metadata_templates_for_enterprise();
        return $templates;
    }
    
    public function saveMetadataTemplate(array $params)
    {
        $template = new \comcduarte\Box\API\Resource\MetadataTemplate($params['access_token']->getAccessToken());

//         $template->displayName = 'contract';
//         $template->scope = 'enterprise';
        
//         $array = [
//             'COI Expiration' => 'date',
//             'Contract Amount' => 'float',
//             'Contract End Date' => 'date',
//             'Contract Number' => 'string',
//             'Contract Number Link' => 'string',
//             'Contract Status' => 'string',
//             'Created By' => 'string',
//             'Department CR' => 'string',
//             'Department Manager' => 'string',
//             'Formal Bid Number' => 'string',
//             'Legal Approver' => 'string',
//             'Legal Approver Date' => 'date',
//             'Mayors Approval' => 'string',
//             'Mayors Approval Date' => 'date',
//             'Pay Terms' => 'string',
//             'Project Name' => 'string',
//             'Purchasing Reviewer' => 'string',
//             'Purchasing Reviewer Date' => 'date',
//             'Renewal Term' => 'float',
//             'Risk Approver' => 'string',
//             'Risk Approver Date' => 'date',
//             'Vendor Number' => 'float',
//             'Vendor Name' => 'string',
//         ];

//         $template->displayName = 'legal-opinion';
//         $template->scope = 'enterprise';
        
//         $array = [
//             'Book No' => 'string',
//             'Date' => 'date',
//             'Department' => 'string',
//             'Doc ID' => 'string',
//             'Opinion No' => 'string',
//             'Subject' => 'string',
//         ];
        
//         $template->displayName = 'amendment';
//         $template->scope = 'enterprise';
        
//         $array = [
//             'Amendment Number' => 'string',
//             'Amendment Number Link' => 'string',
//         ];
        
        foreach ($array as $name => $type) {
            $x = new Field();
            $x->displayName = $name;
            $x->description = $name;
            $x->type = $type;
            
            $template->fields[] = $x;
        }
        
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
        $result = $template->remove_metadata_template('enterprise', $template_key);
        
        return;
    }
}