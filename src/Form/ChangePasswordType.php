<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email',EmailType::class,[
                'disabled' => true,
                'label' => 'Votre Email'
            ])
            ->add('firstname',TypeTextType::class,[
                'disabled' => true,
                'label' => 'Votre nom'
            ])
            ->add('lastname',TypeTextType::class,[
                'disabled' => true,
                'label' => 'Votre prenom'
            ])
            ->add('old_password',PasswordType::class,[
                'mapped'=> false,
                'label' =>'Mon nouveau mot de passe actuel',
                'attr' => [
                    'placeholder' => 'Veuillez saisir votre mot de passe'
                ]
            ])

            ->add('new_password',RepeatedType::class,[
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'le mot de passe et la confirmation doivent etre identique',
                'label' => 'Votre nouveau mot de passe',
                'required' => true,
                'first_options' => [ 'label' => 'Mot de passe',
                'attr' => [
                    'placeholder' => 'Merci de saisire votre mot de passe'
                ]],
                'second_options' => [ 'label' => 'Confirmez votre nouveau mot de passe',
                                        'attr' => [
                                            'placeholder' => 'Merci de saisire votre mot de passe'
                                        ]],

            ])

            ->add('submit',SubmitType::class,[
                'label' => "Changer votre mot de passe",
                'attr' => [
                    'placeholder' => 'Merci de saisire nouveau votre mot de passe'
                ]
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
