<?php

namespace App\Form;

use App\Entity\Poule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PouleCreaFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none'],])

            ->add('sexe_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none'],])

            ->add('photo_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none'],])

            ->add('race_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none'],])

            ->add('colori_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 shadow-none'],])

            ->add('bague_poule', CheckboxType::class, ['attr' => ['class' => 'areaDesc my-2 shadow-none'],])

            ->add('commentaire_poule', TextType::class, ['attr' => ['class' => 'areaDesc form-control mx-auto my-2 pb-5 shadow-none'],])

            ->add('date_eclo', DateType::class, ['attr' => ['class' => 'dateDesc pb-4 mx-auto my-2 shadow-none'],])
            ->add('Ajouter', SubmitType::class, ['attr' => ['class' => 'buttonCustom mx-auto shadow-none'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Poule::class,
        ]);
    }
}
