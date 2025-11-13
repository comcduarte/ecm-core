<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class EcmApplication extends MetadataInstance
{
    protected string $queue = '';
    protected string $contractNumber = '';
    protected string $projectName = '';
    
    public function getQueue()
    {
        return $this->queue;
    }
    
    public function setQueue($queue)
    {
        $this->queue = $queue;
        return $this;
    }
    
    public function getProjectName(): string
    {
        return $this->projectName;
    }
    
    public function setProjectName($projectName): self
    {
        $this->projectName = $projectName;
        return $this;
    }
    
    public function getContractnumber()
    {
        return $this->contractNumber;
    }
    
    public function setContractnumber($contractNumber)
    {
        $this->contractNumber = $contractNumber;
        return $this;
    }
    
    public function setType($type): self
    {
        /**
         * Do not change the type of this object
         */
        return $this;
    }
    
    public function exchangeArray($data)
    {
        parent::exchangeArray($data);
        
        $this->contractNumber = $data['contract-number'] ?? "";
        $this->queue = $data['queue'] ?? "";
        $this->projectName = $data['PROJECT_NAME'] ?? "";
    }
    
    public function getArrayCopy()
    {
        $data = parent::getArrayCopy();

        $data['queue'] = $this->getId();
        $data['contractNumber'] = $this->getContractnumber();
        $data['projectName'] = $this->getProjectName();
        
        return $data;
    }
}