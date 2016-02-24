<?php

namespace AppBundle\Form\Type;

class StateType
{
    private $states;

    public function __construct($states)
    {
        foreach($states as $abbreviation => $state) {
            $this->states[$abbreviation] = $state['name'];
        }
    }
}
