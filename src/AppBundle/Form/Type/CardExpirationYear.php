<?php

namespace AppBundle\Form\Type;

class CardExpirationYear
{
    private $years;

    public function __construct()
    {
        $iYear = date('Y');
        while ($iYear <= date("Y") + 10) {
            $this->years[$iYear] = $iYear;
            $iYear++;
        }
    }
}
