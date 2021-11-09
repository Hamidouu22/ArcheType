<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormTypeInterface;


class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre email'
            ])

            ->add('password', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux mots de passe sont différents.',
                'required' => true,
                'first_options'  => array('label' => 'Votre mot de passe'),
                'second_options' => array('label' => 'Confirmer votre mot de passe'),
            ))

            ->add('nomUser', TextType::class, [
                'label' => 'Votre nom'
            ])

            ->add('prenomUser', TextType::class, [
                'label' => 'Votre prénom'
            ])

            ->add('phone', TextType::class, [
                'label' => 'Votre numéro'
            ])
            
            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}