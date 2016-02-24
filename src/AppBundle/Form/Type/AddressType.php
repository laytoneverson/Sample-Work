<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\StateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\AddressModel;

class AddressForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street_line_one', TextType::class)
            ->add('city', TextType::class)
            ->add('state', StateType::class)
            ->add('postal_code', TextType::class)
        ;

        if ($options['show_address_two']) {
            $builder->add('street_line_two', TextType::class);

        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddressModel::class,
            'show_address_two' => false,
        ]);
    }
}
