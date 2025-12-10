<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class Amendment extends MetadataInstance
{
    protected string $amendmentNumber = '';
    protected string $documentType = '';
    
    /**
     * Getters and Setters
     */
    public function getAmendmentNumber()
    {
        return $this->amendmentNumber;
    }

    public function setAmendmentNumber($amendmentNumber)
    {
        $this->amendmentNumber = $amendmentNumber;
    }

    public function getDocumentType()
    {
        return $this->documentType;
    }

    public function setDocumentType($documentType)
    {
        $this->documentType = $documentType;
    }

    /**
     * Parent Method Extensions
     */
    public function exchangeArray($data)
    {
        parent::exchangeArray($data);
        
        $this->amendmentNumber = $data['amendment-number'] ?? "";
        $this->documentType = $data['document-type'] ?? "";
    }
    
    public function getArrayCopy()
    {
        $data = parent::getArrayCopy();
        
        $data['amendment-number'] = $this->getAmendmentNumber();
        $data['document-type'] = $this->getDocumentType();
        
        return $data;
    }
}