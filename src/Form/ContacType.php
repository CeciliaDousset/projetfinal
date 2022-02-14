<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContacType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname',TextType::class,[
                'required' => false,
                'label' => 'Your Name',
                'constraints' =>[
                    new NotBlank([
                        'message'=> 'We need your name'
                    ]),
                ]
            ])
            ->add('email',TextType::class,[
                'required' => false,
                'label' => 'Your Email',
                'constraints' =>[
                    new NotBlank([
                        'message'=> 'Your Email here'
                    ]),
                ]
            ])
            ->add('phone',TextType::class,[
                'required' => false,
                'label' => 'Your phone number',
                'constraints' =>[
                    new NotBlank([
                        'message'=> 'Your phone number here'
                    ]),
                ]
            ])
            ->add('subject',TextType::class,[
                'required' => false,
                'label' => 'Message subject',
                'constraints' =>[
                new NotBlank([
                    'message'=> 'Subject'
                ]),
            ]
        ])

            ->add('content',TextareaType::class,[
                'required' => false,
                'label' => 'Your Message Here',
                'constraints' =>[
                new NotBlank([
                    'message'=> 'Your Message here'
                ]),
            ]
        ])
        ;
    }
        public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
