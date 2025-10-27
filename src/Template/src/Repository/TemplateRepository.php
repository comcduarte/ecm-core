<?php
declare(strict_types = 1);
namespace Core\Template\Repository;

use Core\App\Repository\AbstractRepository;
use Core\Template\Entity\Template;
use Dot\DependencyInjection\Attribute\Entity;
use comcduarte\Box\API\AccessToken;
use comcduarte\Box\API\AccessTokenAwareTrait;
use comcduarte\Box\API\Resource\Folder;
use comcduarte\Box\API\Resource\ClientError;
use comcduarte\Box\API\Exception\ClientErrorException;

#[Entity(name: Template::class)]
class TemplateRepository extends AbstractRepository
{
    use AccessTokenAwareTrait;
    
    public function getTemplates(AccessToken $access_token): array
    {
        $folder = new Folder($access_token);
        
        /**
         * @todo Remove hard coded folder id
         */
        $response = $folder->get_folder_information('343236246817');
        
        if ($response instanceof ClientError) {
            throw new ClientErrorException($response->message);
        }
        return $folder->item_collection->entries;
    }
}
