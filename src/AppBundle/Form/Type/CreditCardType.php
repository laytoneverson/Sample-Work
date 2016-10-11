<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\CardExpirationMonthType;
use AppBundle\Form\Type\CardExpirationYear;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\CreditCardModel;

class CreditCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cardNumber', TextType::class,[
                'label' => $options['show_labels'] ? 'Card Number' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? 'First Name' : null],
            ])
            ->add('expirationMonth', CardExpirationMonthType::class,[
                'label' => $options['show_labels'] ? 'Exp Date' : false,
            ])
            ->add('expirationYear', CardExpirationYear::class,[
                'label' => false,
            ])
            ->add('securityCode', TextType::class,[
                'label' => $options['show_labels'] ? 'CVV' : false,
                'attr' => ['placeholder' => $options['show_placeholders'] ? '####' : null],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditCardModel::class,
            'show_placeholders' => true,
            'show_labels' => true,
        ]);
    }
}
