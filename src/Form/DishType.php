<?php

namespace App\Form;

use App\Entity\Dish;
use App\Enum\CourseNames;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DishType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, ['label' => 'Naam'])
            ->add('cooked_by')
            ->add('course', ChoiceType::class, array(
                'required' => true,
                'choices' => CourseNames::getOptions(),
                'label' => 'Gang'
            ))
            ->add('vegetarian', CheckboxType::class, ['label' => 'Vegetarisch'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Dish::class,
        ]);
    }
}
