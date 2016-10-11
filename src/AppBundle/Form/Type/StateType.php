<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StateType extends AbstractType
{
    private $states;

    public function __construct($states)
    {
        foreach($states as $abbreviation => $state) {
            $this->states[$abbreviation] = $state['name'];
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'choices' => $this->states,
        ]);
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}
