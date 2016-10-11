<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Model\PersonModel;

class PartialProspectType extends AbstractType
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
            ->add('emailAddress', EmailType::class, [
                'label' => $options['show_labels'] ? 'Email Address' : false,
                'attr' => [
                    'placeholder' => $options['show_placeholders'] ? 'email@domain.com' : null,
                    'class' => 'emailAddress',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonModel::class,
            'show_labels' => true,
            'show_placeholders' => true,
        ]);
    }
}
