<?php

namespace App\Form;

use App\Entity\OfertaLaboral;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfertaLaboralType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Descripcion',TextType::class)
            ->add('fechaInicioDeConvocatoria',DateType::class,
                ['widget' => 'single_text'])
            ->add('fechaFinConvocatoria',DateType::class,
                ['widget' => 'single_text'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => OfertaLaboral::class,
        ]);
    }
}
