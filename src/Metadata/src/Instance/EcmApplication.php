<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class EcmApplication extends MetadataInstance
{
    protected string $queue = '';
    protected string $contractNumber = '';
    
    public function getQueue()
    {
        return $this->queue;
    }
    
    public function setQueue($queue)
    {
        $this->queue = $queue;
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
    
    public function exchangeArray($data)
    {
        parent::exchangeArray($data);
        
        $this->contractNumber = $data['contractNumber'] ?? null;
        $this->queue = $data['queue'] ?? null;
    }
    
    public function getArrayCopy()
    {
        
        
        $data = parent::getArrayCopy();

        $data['queue'] = $this->queue;
        $data['contractNumber'] = $this->contractNumber;
        
        return $data;
    }
}