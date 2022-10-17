<?php

namespace App\Form;

use App\Entity\Poule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PouleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none actvForm'], ])

            ->add('sexe_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none actvForm'], ])

            ->add('photo_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none actvForm'], ])

            ->add('race_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none actvForm'], ])

            ->add('colori_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none actvForm'], ])

            ->add('bague_poule', CheckboxType::class, ['attr' => ['class' => 'areaDesc my-2 shadow-none actvForm'], ])

            ->add('commentaire_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 pb-5 shadow-none actvForm'], ])

            ->add('date_eclo', DateType::class, ['attr' => ['class' => 'dateDesc pb-4 mx-auto my-2 shadow-none actvForm'], ])
            
            ->add('Ajouter', SubmitType::class, ['attr' => ['class' => 'buttonCustom mx-auto shadow-none actvForm'],])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Poule::class,
        ]);
    }
}
