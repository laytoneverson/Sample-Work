<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\StateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\AddressModel;

class BillingAddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => $options['show_labels'] ? 'First Name' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? 'First Name' : null],
            ])
            ->add('lastName', TextType::class, [
                'label' => $options['show_labels'] ? 'Last Name' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? 'Last Name' : null],
            ])
            ->add('streetLineOne', TextType::class, [
                'label' => $options['show_labels'] ? 'Address' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? 'Address' : null]
            ])
            ->add('city', TextType::class, [
                'label' => $options['show_labels'] ? 'City' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? 'City' : null]
            ])
            ->add('state', StateType::class, [
                'label' => $options['show_labels'] ? 'State' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? 'State' : null]
            ])
            ->add('postalCode', TextType::class, [
                'label' => $options['show_labels'] ? 'Zip Code' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? 'Zip Code' : null]
            ])
        ;

        if ($options['show_address_two']) {
            $builder->add('streetLineTwo', TextType::class, [
                'label' => $options['show_labels'] ? 'Apt / Unit' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? '' : null],
                'required' => false,
            ]);

        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AddressModel::class,
            'show_address_two' => false,
            'show_labels' => true,
            'show_placeholders' => true,
        ]);
    }
}
