<?php
declare(strict_types = 1);
namespace Core\Contract\Repository;

use Core\Contract\Entity\Contract;
use comcduarte\Box\API\AccessToken;
use comcduarte\Box\API\Exception\ClientErrorException;
use comcduarte\Box\API\Resource\ClientError;
use comcduarte\Box\API\Resource\Folder;

class ContractRepository
{

    public function getContracts(array $params, AccessToken $access_token): mixed
    {
        $app_folder = new Folder($access_token);
        $folder_info = $app_folder->list_items_in_folder($params['application-folder']);
        
        //-- FIND CABINET --//
        $folders = [];
        foreach ($folder_info->entries as $entry) {
            if ($entry['name'] != 'CABINET') {
                continue;
            }
            
            $folder_info = $app_folder->list_items_in_folder($entry['id']);
            break;
        }
        
        //-- LIST DOCUMENT TYPES --//
        foreach ($folder_info->entries as $doc_type) {
            
            $doc_type_folder = $app_folder->list_items_in_folder($doc_type['id']);
            
            //-- LIST YEARS --//
            foreach ($doc_type_folder->entries as $year){
                    
                
                $contract_folder = $app_folder->list_items_in_folder($year['id']);
                
                foreach ($contract_folder->entries as $contract) {
                    $folders[$doc_type['name']][$year['name']][$contract['name']] = $contract['id'];
                }
            }
        }
        
        return $folders;
    }
    
    public function createContract(array $params, AccessToken $access_token): Contract
    {
        $contract = new Contract();
        $contract->setProject_name(sprintf('%d-%04d %s', date('Y'), 2, strtoupper($params['project-name'])));
        
        $contract_folder = new Folder($access_token);
        $object = $contract_folder->create_folder($params['parent'], $contract->getProject_name());
        
        if ($object instanceof ClientError) {
            /**
             * @var ClientError $object
             */
            throw new ClientErrorException($object->message);
        }
        
        $contract->setFolder_id($object->id);
        
        $object = $contract_folder->create_folder($contract->getFolder_id(), 'SUPPORTING DOCUMENTATION');
        
        if ($object instanceof ClientError) {
            /**
             * @var ClientError $object
             */
            throw new ClientErrorException($object->message);
        }
        
        return $contract;
    }
    
    public function deleteContract(string $id, AccessToken $access_token): bool
    {
        $contract_folder = new Folder($access_token);
        $object = $contract_folder->delete_folder($id, true);
        if ( $object instanceof ClientError) {
            /**
             * @var ClientError $object
             */
            throw new ClientErrorException($object->message);
        }
        
        return true;
    }
}