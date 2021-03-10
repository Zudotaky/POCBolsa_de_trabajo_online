<?php

namespace App\Form;

use App\Entity\Empresa;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpresaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('cuit')
            ->add('provincia', ChoiceType::class,[
                'choices' => [
                    'Buenos Aires' => 1,
                    'cordova' => 2,
                ]])
            ->add('localidad', ChoiceType::class,[
                'choices' => [
                    'Florencio Varela' => 1,
                    'Bahia Blanca' => 2,
                    'cosquin' => 3,
                    'Rio Cuarto ' => 4
                ]])
            ->add('direccion')
            ->add('telefono')
            ->add('mail')
            ->add('ofertasLaborales',CollectionType::class,[
                'entry_type' => OfertaLaboralType::class,
                'entry_options' => [ 
                    'label' => false
                ],
                'label' => false,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true
            ]) 
            ->add('Enviar', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-success'
                ]]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresa::class,
        ]);
    }
}
