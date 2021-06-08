<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface as FormFormBuilderInterface;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType {
    public function buildForm(FormFormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstname')
        ->add('lastname')
        ->add('email')
        ->add('phone_number')
        ->add('message', CheckboxType::class, [
        'label' => 'En cochant cette case, j\'accepte que le cabinet me contacte pour répondre à ma demande',
        'required' => true,
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}