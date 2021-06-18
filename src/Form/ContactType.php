<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface as FormFormBuilderInterface;
use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ContactType extends AbstractType {

    

    public function buildForm(FormFormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstname', null, array('label' => 'Prénom'))
        ->add('lastname', null, array('label' => 'Nom'))
        ->add('email', null, array('label' => 'Email'))
        ->add('phone_number', null, array('label' => 'Téléphone'))
        ->add('message', null, array('label' => 'Message'))
        ->add('checkbox', CheckboxType::class, [
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