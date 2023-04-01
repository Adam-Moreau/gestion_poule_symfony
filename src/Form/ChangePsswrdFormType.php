<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ChangePsswrdFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword',RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type' => PasswordType::class,
                'mapped' => false,
                'options' =>['attr' => ['autocomplete' => 'new-password', 'class' => 'form-control mx-auto mb-4 shadow-none']],
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer mot de passe'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer un mot de passe',
                    ]),  
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    new Regex([
                       'pattern' => '/[a-z]/',
                       'match'     => true,
                       'message' => 'MAJ'
                    
                    ]),
                    new Regex([
                        'pattern' => '/[A-Z]/',
                        'match'     => true,
                        'message' => 'min'
                    
                    ]),
                    new Regex([
                        'pattern' => '/[\d]/',
                        'match'     => true,
                        'message' => 'chiff'
 
                    ]),
                     new Regex([
                        'pattern' => '/[!?#]/',
                        'match'     => true,
                        'message' => 'carac'    
                     ]),
                    
                ],
            ])
            ->add('Modifier', SubmitType::class, ['attr' => ['class' => 'buttonCustom mx-auto mt-5 shadow-none'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
