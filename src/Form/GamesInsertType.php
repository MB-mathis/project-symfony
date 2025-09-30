<?php

namespace App\Form;

use App\Entity\Gameconsoles;
use App\Entity\Games;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GamesInsertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Game Name',
                'attr' => ['placeholder' => 'Enter game name']
            ])
            ->add('pegi',IntegerType::class, [
                'label' => 'Pegi',
                'attr' => ['placeholder' => 'Enter pegi']
            ])
            ->add('type', EntityType::class, [
                'class' => Gameconsoles::class,
                'choice_label' => 'name',
                'multiple' => true,
            ])
            ->add('save', SubmitType::class, ['label' => 'new game'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Games::class,
        ]);
    }
}
