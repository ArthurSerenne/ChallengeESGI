<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Validator\Constraints as Assert;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstname', TextType::class, [
            'label' => 'First Name',
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['max' => 255]),
            ],
        ])
        ->add('lastname', TextType::class, [
            'label' => 'Last Name',
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['max' => 255]),
            ],
        ])
        ->add('email', EmailType::class, [
            'label' => 'Email',
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Email(),
                new Assert\Length(['max' => 180]),
            ],
        ])
        ->add('gender', ChoiceType::class, [
            'label' => 'Gender',
            'choices' => [
                'Male' => 'male',
                'Female' => 'female',
                'Other' => 'other',
            ],
            'expanded' => false,
            'multiple' => false,
        ])
        ->add('theme', ChoiceType::class, [
            'label' => 'Theme',
            'choices' => [
                'Principal' => 'principal',
                'Turquoise' => 'turquoise',
                'Grenade' => 'grenade',
            ],
            'expanded' => false,
            'multiple' => false,
        ])
        ->add('created_at', DateTimeType::class, [
            'label' => 'Created At',
            'widget' => 'single_text',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}