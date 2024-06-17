<?php

namespace App\Form;

use App\Entity\Devis;
use App\Entity\LigneDevis;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class LigneDevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantite')
            ->add('prix_ht', MoneyType::class, [
                'currency' => 'EUR',
            ])
            ->add('prix_ttc', MoneyType::class, [
                'currency' => 'EUR',
            ])
            ->add('produit', EntityType::class, [
                'class' => Produit::class,
                'choice_label' => function (Produit $produit) {
                    return $produit->getNom();
                },
                'choice_attr' => function (Produit $produit) {
                    return [
                        'data-prix-ht' => $produit->getPrix(),
                    ];
                },
                'placeholder' => 'Sélectionnez un produit',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => LigneDevis::class,
        ]);
    }
}
