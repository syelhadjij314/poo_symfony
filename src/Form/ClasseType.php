<?php

namespace App\Form;

use App\Entity\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClasseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('libelle',TextType::class,[
                'label'=>'libelle',
                'required'=> false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('filiere',ChoiceType::class, [
                'attr'=>['class'=>'form-control'],

                'choices' => [
                    'Dev Web'=>'Dev Web',
                    'Ref Dig'=>'Ref Dig'                   

                ]
            ])
            ->add('niveau', ChoiceType::class, [
                'attr'=>['class'=>'form-control'],
                'choices' => [
                    'L1'=>'L1',
                    'L2'=>'L2',
                    'L3'=>'L3',
                    'M1'=>'M1',
                    'M2'=>'M2'
                ]
            ])
            // ->add('professeurs')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Classe::class,
        ]);
    }
}
