<?php

namespace AppBundle\Form;

use AppBundle\Form\Type\CardExpirationMonthType;
use AppBundle\Form\Type\CardExpirationYear;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\CreditCardModel;

class CreditCardForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('card_number', TextType::class)
            ->add('expiration_month', CardExpirationMonthType::class)
            ->add('expiration_year', CardExpirationYear::class)
            ->add('security_code', TextType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditCardModel::class
        ]);
    }
}
