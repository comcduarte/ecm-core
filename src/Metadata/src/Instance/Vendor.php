<?php
declare(strict_types=1);

namespace Core\Metadata\Instance;

use comcduarte\Box\API\Resource\MetadataInstance;

class Vendor extends MetadataInstance
{
    public const templateKey = 'vendor';
    
    public string $firstName = '';
    public string $lastName = '';
    public string $companyName = '';
    public string $address = '';
    public string $city = '';
    public string $state = '';
    public string $postalCode = '';
    public string $emailAddress = '';
    
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \comcduarte\Box\API\Resource\BaseResource::setType()
     */
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
        
        $this->firstName = $data['first-name'] ?? "";
        $this->lastName = $data['last-name'] ?? "";
        $this->companyName = $data['company-name'] ?? "";
        $this->address = $data['address'] ?? "";
        $this->city = $data['city'] ?? "";
        $this->state = $data['state'] ?? "";
        $this->postalCode = $data['postal-code'] ?? "";
        $this->emailAddress = $data['email-address'] ?? "";
    }
    
    public function getArrayCopy()
    {
        $data = parent::getArrayCopy();
        
        $data['first-name'] = $this->getFirstName();
        $data['last-name'] = $this->getLastName();
        $data['company-name'] = $this->getCompanyName();
        $data['address'] = $this->getAddress();
        $data['city'] = $this->getCity();
        $data['state'] = $this->getState();
        $data['postal-code'] = $this->getPostalCode();
        $data['email-address'] = $this->getEmailAddress();
        
        return $data;
    }
}