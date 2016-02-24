<?php

namespace AppBundle\Model;

class PersonModel
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var AddressModel
     */
    private $shippingAddress;

    /**
     * @var AddressModel
     */
    private $billingAddress;

    /**
     * @var string
     */
    private $emailAddress;

    /**
     * @var string
     */
    private $phoneNumber;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return PersonModel
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
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
     * @return PersonModel
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return AddressModel
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param AddressModel $shippingAddress
     * @return PersonModel
     */
    public function setShippingAddress(AddressModel $shippingAddress)
    {
        if (empty($shippingAddress->getFirstName())) {
            $shippingAddress->setFirstName($this->getFirstName());
        }
        if (empty($shippingAddress->getLastName())) {
            $shippingAddress->setLastName($this->getLastName());
        }
        $this->shippingAddress = $shippingAddress;

        return $this;
    }

    /**
     * @return AddressModel
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param AddressModel $billingAddress
     * @return PersonModel
     */
    public function setBillingAddress(AddressModel $billingAddress)
    {
        if (empty($billingAddress->getFirstName())) {
            $billingAddress->setFirstName($this->getFirstName());
        }
        if (empty($billingAddress->getLastName())) {
            $billingAddress->setLastName($this->getLastName());
        }

        $this->billingAddress = $billingAddress;

        return $this;
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
     * @return PersonModel
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return PersonModel
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
}
