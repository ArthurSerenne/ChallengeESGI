<?php

namespace App\Form;

use App\Entity\Clients;
use App\Entity\Facture;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('total_ht')
            ->add('total_ttc')
            ->add('total_tva')
            ->add('remise')
            ->add('client', EntityType::class, [
                'class' => Clients::class,
                'choice_label' => 'name',
            ])
            ->add('lignesFacture', CollectionType::class, [
                'entry_type' => LigneFactureType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'by_reference' => false,
                'prototype' => true,
                'prototype_name' => '__name__',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Facture::class,
        ]);
    }
}
