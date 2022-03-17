<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file',FileType::class,[
                'label' => 'Ajouter une image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '1m'
                    ])
                ],
            ])
            ->add('name',TextType::class,[
                'label' => 'Nom du produit'
            ])

            ->add('description',TextareaType::class,[
                'required' => false,
                'label' => 'Description',
               
            ])

            ->add('price',MoneyType::class,[
                'divisor' => 100,
                'currency' => 'EUR',
            ])
            ->add('category',EntityType::class,[
                'label' => 'Catégorie',
                'placeholder' => '-- Choisir une catégorie --',
                'class' => Category::class
            ])
            ->add('isVisible',ChoiceType::class,[
                'label' => 'Le produit est disponible?',
                'placeholder' => '-- Choisir  --',
                'choices' => [
                    'oui' => '1', 
                    'non' => '0'
                ]
              
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
