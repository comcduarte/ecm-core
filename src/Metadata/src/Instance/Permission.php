<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class Permission extends MetadataInstance
{
    public const templateKey = 'permission';
    public string $department = '';
    
    /**
     * @return string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    public function setType($type)
    {
        /**
         * Do not change the type of this object
         */
        return $this;
    }
    
    public function exchangeArray(array $data)
    {
        parent::exchangeArray($data);
        
        $this->department = $data['department'] ?? "";
    }
    
    public function getArrayCopy()
    {
        $data = parent::getArrayCopy();
        
        $data['department'] = $this->getDepartment();
        
        return $data;
    }
}