<?php

namespace AppBundle\Model;

class CreditCardModel
{
    /**
     * @var string
     */
    private $cardNumber;

    /**
     * @var string
     */
    private $expirationMonth;

    /**
     * @var string
     */
    private $expirationYear;

    /**
     * @var string
     */
    private $securityCode;

    /**
     * @return string
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @param string $cardNumber
     * @return CreditCardModel
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpirationMonth()
    {
        return $this->expirationMonth;
    }

    /**
     * @param string $expirationMonth
     * @return CreditCardModel
     */
    public function setExpirationMonth($expirationMonth)
    {
        $this->expirationMonth = $expirationMonth;

        return $this;
    }

    /**
     * @param int $digits
     * @return string
     */
    public function getExpirationYear($digits = 2)
    {
        return substr($this->expirationYear, $digits * -1);
    }

    /**
     * @param string $expirationYear
     * @return CreditCardModel
     */
    public function setExpirationYear($expirationYear)
    {
        $this->expirationYear = $expirationYear;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * @param string $securityCode
     * @return CreditCardModel
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $securityCode;

        return $this;
    }


}
