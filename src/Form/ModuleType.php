<?php

namespace App\Form;

use App\Entity\ModuleReference;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModuleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('image', FileType::class, [
                'label' => 'Photo',
                'attr' => [
                    'class' => 'form-control'
                ],
                'data_class' => null,
            ])
            ->add('name', null, [
                'label' => 'Nom / Référence',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ModuleReference::class,
        ]);
    }
}
