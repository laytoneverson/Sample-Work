<?php

namespace AppBundle\Model;

class AddressModel
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
     * @var string
     */
    private $streetLineOne;

    /**
     * @var string
     */
    private $streetLineTwo;

    /**
     * @var string
     */
    Private $city;

    /**
     * @var string
     */
    Private $state;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return AddressModel
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
     * @return AddressModel
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetLineOne()
    {
        return $this->streetLineOne;
    }

    /**
     * @param mixed $streetLineOne
     * @return AddressModel
     */
    public function setStreetLineOne($streetLineOne)
    {
        $this->streetLineOne = $streetLineOne;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreetLineTwo()
    {
        return $this->streeLineTwo;
    }

    /**
     * @param mixed $streetLineTwo
     * @return AddressModel
     */
    public function setStreetLineTwo($streetLineTwo)
    {
        $this->streetLineTwo = $streetLineTwo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return AddressModel
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     * @return AddressModel
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     * @return AddressModel
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }
}
