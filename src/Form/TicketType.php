<?php

namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('object', ChoiceType::class, [
                'choices' => [
                    'Problème avec mon module' => 'Problème avec mon module',
                    'Problème avec l\'application' => 'Problème avec l\'application',
                    'Facturation' => 'Facturation',
                    'Autre' => 'Autre',
                ]
            ])
            ->add('message', null, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ticket::class,
        ]);
    }
}
