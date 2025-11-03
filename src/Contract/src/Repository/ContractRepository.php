<?php
declare(strict_types = 1);
namespace Core\Contract\Repository;

use Core\Contract\Entity\Contract;
use Core\Metadata\Instance\EcmApplication;
use Laminas\Validator\Regex;
use comcduarte\Box\API\AccessToken;
use comcduarte\Box\API\MetadataQuery;
use comcduarte\Box\API\Exception\ClientErrorException;
use comcduarte\Box\API\Resource\ClientError;
use comcduarte\Box\API\Resource\File;
use comcduarte\Box\API\Resource\Folder;

class ContractRepository
{

    public function getContracts(array $params, AccessToken $access_token): mixed
    {
        $app_folder = new Folder($access_token);
        $folder_info = $app_folder->list_items_in_folder($params['application-folder']);
        
        if ($folder_info instanceof ClientError) {
            throw new ClientErrorException($folder_info->message);
        }
        
        
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
                    $entity = new Contract();
                    $entity->setProject_name($contract['name']);
                    $entity->setFolder_id($contract['id']);
                    
                    $folders[$doc_type['name']][$year['name']][$contract['name']] = $entity;
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
        $contract->setContract_folder($contract_folder);
        
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

    public function find(string $folder_id, AccessToken $access_token): Contract
    {
        $contract = new Contract();
        
        $contract_folder = new Folder($access_token);
        $contract_folder->get_folder_information($folder_id);
        $contract->setContract_folder($contract_folder);
        
        $items = $contract_folder->list_items_in_folder($folder_id);
        
        $validator = new Regex('/^\d{4}-\d{0,4}.*[pPdDfF]{3}$/');
        $contract_file_id = null;
        foreach ( $items->entries as $item) {
            if ($validator->isValid($item['name'])) {
                $contract_file_id = $item['id'];
            }
        }
        
        $contract_file = new File($access_token);
//         $contract_file->list_all_representations();
        $contract_file->get_file_information($contract_file_id);
//         $contract_file->request_desired_representation(Representation::TYPE_JPG, Representation::DIMENSION_1024x1024);
        $contract->setContract_file($contract_file);
        
        return $contract;
    }
    
    public function search(array $params, AccessToken $access_token): array
    {
        /**
         * Metadata Query
         */
        $metadata_query = new MetadataQuery($access_token);
        $metadata_query_search_results = $metadata_query->metadata_query(
            (string) $params['ancestor_folder_id'],
            $params['scope'] . "." . $params['template_key'],
            $params['query'],
            $params['query_params'],
            );
        if ($metadata_query_search_results instanceof ClientError) {
            /**
             * @var ClientError $metadata_query_search_results
             */
            throw new ClientErrorException($metadata_query_search_results->message);
        }
        
        $contracts = [];
        foreach ($metadata_query_search_results->entries as $contract) {
            $x = new Contract();
            $x->setProject_name($contract['name']);
            $x->setFolder_id($contract['id']);
            $contracts[] = $x;
        }
        
        
        return [
            $contracts,
        ];
    }

    public function move(string $source, string $destination, AccessToken $access_token): bool
    {
        $folder = new Folder($access_token);
        $result= $folder->update_folder($source, ['parent' => ['id' => $destination]]);
        
        if ($result instanceof ClientError) {
            throw new ClientErrorException($result->message);
        }
        
        $folder_id = $source;
        $scope = 'enterprise_1328932288';
        $template_key = 'ecm-application';
        $data = [
            [
                'op' => 'replace',
                'path' => '/queue',
                'value' => $destination,
            ],
        ];        
        
        $metadata_instance = new EcmApplication($access_token);
        
        $result = $metadata_instance->get_metadata_instance_on_folder($source, $scope, $template_key);
        if ($result instanceof ClientError) {
            throw new ClientErrorException($result->message);
        }
        
        $result = $metadata_instance->update_metadata_instance_on_folder($folder_id, $scope, $template_key, $data);
        if ($result instanceof ClientError) {
            throw new ClientErrorException($result->message);
        }
        
        return true;
    }
}