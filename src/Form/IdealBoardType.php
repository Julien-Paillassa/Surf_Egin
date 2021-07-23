<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdealBoardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Niveau', ChoiceType::class, [
                'choices' => [
                    'débutant' => 'débutant',
                    'intermédaire' => 'intermédaire',
                    'confirmé' => 'confirmé'
                ]
            ])
            ->add('Poids', ChoiceType::class, [
                'choices' => [
                    'entre 36kg et 40kg' => '21L',
                    'entre 41kg et 45kg' => '23L',
                    'entre 46kg et 50kg' => '25L',
                    'entre 51kg et 55kg' => '27L',
                    'entre 56kg et 60kg' => '29L',
                    'entre 61kg et 65kg' => '31L',
                    'entre 71kg et 75kg' => '33L',
                    'entre 76kg et 80kg' => '35L',
                    'entre 81kg et 85kg' => '37L',
                    'entre 86kg et 90kg' => '39L',
                    'entre 91kg et 95kg' => '41L',
                    'entre 96kg et 100kg' => '43L',
                ]
            ])
            ->add('rechercher', SubmitType::class)
        ;
    }
}