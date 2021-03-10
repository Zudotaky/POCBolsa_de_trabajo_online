<?php

namespace App\Form;

use App\Entity\Alumno;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlumnoformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('TipoDeDocumento',ChoiceType::class,[
                'choices' => [
                    'DNI' => 1,
                    'CI' => 2,
                    'LE' => 3,
                    'LC' => 4
                ]])
            ->add('numeroDeDocumento')
            ->add('fechaDeNacimiento',DateType::class,['widget' => 'single_text'])
            ->add('mail')
            ->add('carrera')
            ->add('tiempoEnCarrera')
            ->add('experienciasPrevias')
            ->add('Enviar', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Alumno::class,
        ]);
    }
}
