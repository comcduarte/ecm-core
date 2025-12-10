<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class Approval extends MetadataInstance
{
	protected string $departmentApprover = '';
	protected string $departmentApproverDate = '';
	protected string $legalApprover = '';
	protected string $legalApproverDate = '';
	protected string $riskApprover = '';
	protected string $riskApproverDate = '';
	protected string $purchasingApprover = '';
	protected string $purchasingApproverDate = '';
	protected string $mayorApprover = '';
	protected string $mayorApproverDate = '';
	protected string $vendorApprover = '';
	protected string $vendorApproverDate = '';
	
    public function getDepartmentApprover()
    {
        return $this->departmentApprover;
    }

    public function getDepartmentApproverDate()
    {
        return $this->departmentApproverDate;
    }

    public function getLegalApprover()
    {
        return $this->legalApprover;
    }

    public function getLegalApproverDate()
    {
        return $this->legalApproverDate;
    }

    public function getRiskApprover()
    {
        return $this->riskApprover;
    }

    public function getRiskApproverDate()
    {
        return $this->riskApproverDate;
    }

    public function getPurchasingApprover()
    {
        return $this->purchasingApprover;
    }

    public function getPurchasingApproverDate()
    {
        return $this->purchasingApproverDate;
    }

    public function getMayorApprover()
    {
        return $this->mayorApprover;
    }

    public function getMayorApproverDate()
    {
        return $this->mayorApproverDate;
    }

    public function getVendorApprover()
    {
        return $this->vendorApprover;
    }

    public function getVendorApproverDate()
    {
        return $this->vendorApproverDate;
    }

    public function setDepartmentApprover($departmentApprover)
    {
        $this->departmentApprover = $departmentApprover;
    }

    public function setDepartmentApproverDate($departmentApproverDate)
    {
        $this->departmentApproverDate = $departmentApproverDate;
    }

    public function setLegalApprover($legalApprover)
    {
        $this->legalApprover = $legalApprover;
    }

    public function setLegalApproverDate($legalApproverDate)
    {
        $this->legalApproverDate = $legalApproverDate;
    }

    public function setRiskApprover($riskApprover)
    {
        $this->riskApprover = $riskApprover;
    }

    public function setRiskApproverDate($riskApproverDate)
    {
        $this->riskApproverDate = $riskApproverDate;
    }

    public function setPurchasingApprover($purchasingApprover)
    {
        $this->purchasingApprover = $purchasingApprover;
    }

    public function setPurchasingApproverDate($purchasingApproverDate)
    {
        $this->purchasingApproverDate = $purchasingApproverDate;
    }

    public function setMayorApprover($mayorApprover)
    {
        $this->mayorApprover = $mayorApprover;
    }

    public function setMayorApproverDate($mayorApproverDate)
    {
        $this->mayorApproverDate = $mayorApproverDate;
    }

    public function setVendorApprover($vendorApprover)
    {
        $this->vendorApprover = $vendorApprover;
    }

    public function setVendorApproverDate($vendorApproverDate)
    {
        $this->vendorApproverDate = $vendorApproverDate;
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
        
	    $this->setDepartmentApprover($data['departmentApprover']);
        $this->setDepartmentApproverDate($data['departmentApproverDate']);
        $this->setLegalApprover($data['legalApprover']);
        $this->setLegalApproverDate($data['legalApproverDate']);
        $this->setRiskApprover($data['riskApprover']);
        $this->setRiskApproverDate($data['riskApproverDate']);
        $this->setPurchasingApprover($data['purchasingApprover']);
        $this->setPurchasingApproverDate($data['purchasingApproverDate']);
        $this->setMayorApprover($data['mayorApprover']);
        $this->setMayorApproverDate($data['mayorApproverDate']);
        $this->setVendorApprover($data['vendorApprover']);
        $this->setVendorApproverDate($data['vendorApproverDate']);
    }
	
    public function getArrayCopy(): array
    {
        $data = parent::getArrayCopy();
        
    	$data['departmentApprover'] = $this->getDepartmentApprover();
    	$data['departmentApproverDate'] = $this->getDepartmentApproverDate();
    	$data['legalApprover'] = $this->getLegalApprover();
    	$data['legalApproverDate'] = $this->getLegalApproverDate();
    	$data['riskApprover'] = $this->getRiskApprover();
    	$data['riskApproverDate'] = $this->getRiskApproverDate();
    	$data['purchasingApprover'] = $this->getPurchasingApprover();
    	$data['purchasingApproverDate'] = $this->getPurchasingApproverDate();
    	$data['mayorApprover'] = $this->getMayorApprover();
    	$data['mayorApproverDate'] = $this->getMayorApproverDate();
    	$data['vendorApprover'] = $this->getVendorApprover();
    	$data['vendorApproverDate'] = $this->getVendorApproverDate();
        
        return $data;
    }
}