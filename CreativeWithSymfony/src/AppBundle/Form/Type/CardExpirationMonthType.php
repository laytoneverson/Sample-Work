<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CardExpirationMonthType extends AbstractType
{
    private $expMonths = [
        '01' => '01 - January',
        '02' => '02 - February',
        '03' => '03 - March',
        '04' => '04 - April',
        '05' => '05 - May',
        '06' => '06 - June',
        '07' => '07 - July',
        '08' => '08 - August',
        '09' => '09 - September',
        '10' => '10 - October',
        '11' => '11 - November',
        '12' => '12 - December',
    ];

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => $this->expMonths,
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
