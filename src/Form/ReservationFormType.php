<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

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
            
            

            ->add('RDV', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y') + 1),
                'required' => false,
                'label' => '',
                
            ])
                
           
            
            ->add('couvert', ChoiceType::class, [
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 7,
                    '7' => 8,
                    '8' => 9,
                    '9' => 10,

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
