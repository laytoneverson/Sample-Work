<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\OrderModel;

class CheckoutType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('useShippingAddress', ChoiceType::class, [
                'label' => $options['show_labels']
                    ? 'Is your billing address the same as your shipping address?'
                    : false,
                'expanded' => true,
                'choices' => [
                    '0' => 'Yes',
                    '1' => 'No'
                ]
            ])
            ->add('billingAddress', AddressType::class, [
                'show_labels' => $options['show_labels'],
                'show_placeholders' => $options['show_placeholders'],
            ])
            ->add('creditCard', CreditCardType::class, [
                'show_labels' => $options['show_labels'],
                'show_placeholders' => $options['show_placeholders'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OrderModel::class,
            'show_labels' => true,
            'show_placeholders' => true,
        ]);
    }
}
