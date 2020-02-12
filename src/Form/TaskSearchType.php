<?php

namespace App\Form;

use App\Entity\TaskSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('state', ChoiceType::class,
                ['choices'=>[ 'A faire'=>'todo',
                    'En cours'=> 'underway', 'Fait'=>'done'],
                    'multiple'=>true, 'expanded'=>true])
            ->add('priorOrder', ChoiceType::class,
                ['choices'=>['Yes'=>true, 'No'=>false], 'expanded'=>true, 'multiple'=>false]);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => TaskSearch::class,
            'method'=>'get',
            'csrf_protection'=>false
        ]);
    }
}
