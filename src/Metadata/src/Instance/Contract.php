<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class Contract extends MetadataInstance
{
    protected string $coiExpiration = '';
    protected string $contractAmount = '';
    protected string $contractEndDate = '';
    protected string $contractStatus = '';
    protected string $documentType = '';
    
    public function getCoiExpiration()
    {
        return $this->coiExpiration;
    }

    public function getContractAmount()
    {
        return $this->contractAmount;
    }

    public function getContractEndDate()
    {
        return $this->contractEndDate;
    }

    public function getContractStatus()
    {
        return $this->contractStatus;
    }

    public function getDocumentType()
    {
        return $this->documentType;
    }

    public function setCoiExpiration($coiExpiration)
    {
        $this->coiExpiration = $coiExpiration;
    }

    public function setContractAmount($contractAmount)
    {
        $this->contractAmount = $contractAmount;
    }

    public function setContractEndDate($contractEndDate)
    {
        $this->contractEndDate = $contractEndDate;
    }

    public function setContractStatus($contractStatus)
    {
        $this->contractStatus = $contractStatus;
    }

    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
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
        
        $this->setCoiExpiration($data['coiExpiration']);
        $this->setContractAmount($data['contractAmount']);
        $this->setContractEndDate($data['contractEndDate']);
        $this->setContractStatus($data['contractStatus']);
        $this->setDocumentType($data['documentType']);
        
    }
    
    public function getArrayCopy(): array
    {
        $data = parent::getArrayCopy();
        
        $data['coiExpiration']   = $this->getCoiExpiration();
        $data['contractAmount']  = $this->getContractAmount();
        $data['contractEndDate'] = $this->getContractEndDate();
        $data['contractStatus']  = $this->getContractStatus();
        $data['documentType']    = $this->getDocumentType();
        
        return $data;
    }
}