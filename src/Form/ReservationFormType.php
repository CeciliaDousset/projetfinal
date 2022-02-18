<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'type_nom',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Nom',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner votre nom']),
                    ]
                ]
            )
     

            ->add(
                'le_prenom',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Prenom',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner votre prenom']),
                    ]
                ]
            )

            

           ->add('RDV', DateTimeType::class, [
                'placeholder' => [
                    'year' => 'Year', 'month' => 'Month', 'day' => 'Day',
                    'hour' => 'Hour', 
                ]
             ]
           )
            

                ->add(
                    'type_nom',
                    TextType::class,
                    [
                        'required' => false,
                        'label'   => 'Nom',
                        'constraints' => [
                            new NotBlank(['message' => 'Vous devez renseigner votre nom']),
                        ]
                    ]
                )
            
            ->add(
                'telephone_customer',
                TextType::class,
                [
                    'required' => false,
                    'label'   => 'Votre numero de telephone',
                    'constraints' => [
                        new NotBlank(['message' => 'Vous devez renseigner votre numero de telephone']),
                    ]
                ]
            );
        }
}
           
        
    
          
