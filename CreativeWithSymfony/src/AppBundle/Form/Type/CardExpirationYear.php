<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CardExpirationYear extends AbstractType
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => $this->years,
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
