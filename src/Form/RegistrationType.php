<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Image;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('email', EmailType::class, [
                'attr' => [
                    "placeholder" => "a confirmation email will be send"
                ],
                'label' => "Email"
            ])
            ->add('userName', TextType::class, [
                'attr' => [
                    "placeholder" => "userName"

                ],
                'label' => "Nom d'utilisateur"
            ])
            ->add('password', PasswordType::class, [
                'label' => "Mot de passe"
            ])
            ->add('avatar', FileType::class, [
                'label' => 'Avatar :',
                'data_class' => null,
                'attr' => [
                    'placeholder' => 'Ajouter un avatar'
                ],
                'constraints' => [
                    new Image([
                        'maxSize' => '5M',
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
