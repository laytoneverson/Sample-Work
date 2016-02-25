<?php

namespace AppBundle\Model;

class OrderModel
{
    /**
     * @var PersonModel
     */
    private $person;

    /**
     * @var AddressModel
     */
    private $billingAddress;

    /**
     * @var ProductModel
     */
    private $product;

    /**
     * @var CreditCardModel
     */
    private $creditCard;

    /**
     * @var boolean
     */
    private $useShippingAddress;

    /**
     * @return PersonModel
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param PersonModel $person
     * @return OrderModel
     */
    public function setPerson($person)
    {
        $this->person = $person;

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
     * @return OrderModel
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    /**
     * @return ProductModel
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param ProductModel $product
     * @return OrderModel
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return CreditCardModel
     */
    public function getCreditCard()
    {
        return $this->creditCard;
    }

    /**
     * @param CreditCardModel $creditCard
     * @return OrderModel
     */
    public function setCreditCard($creditCard)
    {
        $this->creditCard = $creditCard;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isUseShippingAddress()
    {
        return $this->useShippingAddress;
    }
    /**
     * @return boolean
     */
    public function getUseShippingAddress()
    {
        return $this->useShippingAddress;
    }

    /**
     * @param boolean $useShippingAddress
     * @return OrderModel
     */
    public function setUseShippingAddress($useShippingAddress)
    {
        $this->useShippingAddress = $useShippingAddress;
        return $this;
    }
}
