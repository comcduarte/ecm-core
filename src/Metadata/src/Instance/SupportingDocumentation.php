<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class SupportingDocumentation extends MetadataInstance
{
    protected string $documentType = '';
    
    public function getDocumentType(): string
    {
        return $this->documentType;
    }

    public function setDocumentType($documentType): self
    {
        $this->documentType = $documentType;
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
        
        $this->setDocumentType($data['document-type']);
    }
 
    public function getArrayCopy()
    {
        $data = parent::getArrayCopy();
        
        $data['document-type'] = $this->getDocumentType();
        
        return $data;
    }
}