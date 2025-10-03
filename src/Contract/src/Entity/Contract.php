<?php
declare(strict_types=1);

namespace Core\Contract\Entity;

use Core\App\Entity\EntityInterface;
use Laminas\Stdlib\ArraySerializableInterface;
use Ramsey\Uuid\UuidInterface;
use DateTimeImmutable;
use comcduarte\Box\API\Resource\Folder;

class Contract implements ArraySerializableInterface, EntityInterface
{
    protected UuidInterface $uuid;
    
    protected string $folder_id;
    
    protected string $project_name;
    
    protected Folder $contract_folder;
    
    /**
     * @return \comcduarte\Box\API\Resource\Folder
     */
    public function getContract_folder()
    {
        return $this->contract_folder;
    }

    /**
     * @param \comcduarte\Box\API\Resource\Folder $contract_folder
     */
    public function setContract_folder($contract_folder)
    {
        $this->contract_folder = $contract_folder;
    }

    /**
     * @return string
     */
    public function getFolder_id()
    {
        return $this->folder_id;
    }

    /**
     * @return string
     */
    public function getProject_name()
    {
        return $this->project_name;
    }

    /**
     * @param string $folder_id
     */
    public function setFolder_id($folder_id)
    {
        $this->folder_id = $folder_id;
    }

    /**
     * @param string $project_name
     */
    public function setProject_name($project_name)
    {
        $this->project_name = $project_name;
    }

    public function getUpdated(): ?DateTimeImmutable
    {
        
    }

    public function getCreatedFormatted(string $dateFormat = 'Y-m-d H:i:s'): string
    {
        
    }

    public function getUpdatedFormatted(string $dateFormat = 'Y-m-d H:i:s'): ?string
    {
        
    }

    public function getCreated(): ?DateTimeImmutable
    {
        
    }
    
    public function getArrayCopy(): array
    {
        return [
            'uuid'         => $this->uuid->toString(),
            'folder_id'    => $this->getFolder_id(),
            'project_name' => $this->getProject_name(),
        ];
    }
    
    public function isDeleted(): bool
    {}
    
    public function getUuid(): UuidInterface
    {}
    
    public function exchangeArray(array $array): void
    {
        foreach ($array as $property => $values) {
            if (is_array($values)) {
                $method = 'add' . ucfirst($property);
                if (! method_exists($this, $method)) {
                    continue;
                }
                foreach ($values as $value) {
                    $this->$method($value);
                }
            } else {
                $method = 'set' . ucfirst($property);
                if (! method_exists($this, $method)) {
                    continue;
                }
                $this->$method($values);
            }
        }
    }
}