<?php

namespace App\Controller;

use App\Entity\Alumno;
use App\Form\AlumnoformType;
use App\Repository\AlumnoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Workflow\Registry;

class AlumnoController extends AbstractController
{   
    
    private $workflowRegistry;

    public function __construct(Registry $workflowRegistry)
    {
        $this->workflowRegistry = $workflowRegistry;
    }

    /**
     * @Route("/alumnos", name="app_Alumnos")
     */
    public function MostrarAlumnos(){
        
        $alumnos = $this->getDoctrine()->getRepository(Alumno::class)->findAll();
        return $this->render('BolsaDeTrabajo/Alumnos.html.twig', [
            'alumnos' => $alumnos
        ]);

    }

    /**
     * @Route("/FormularioAlumno", name="app_FormularioAlumno")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function FormularioAlumno(Request $request,ValidatorInterface $validator){


        //doctrine manager para persistir
        $ma = $this->getDoctrine()->getManager();

        //creo un form de Alumno
        $Alumno = new Alumno();
        $form = $this->createForm(AlumnoformType::class,$Alumno);
        $form->handleRequest($request);

        $errors = $validator->validate($Alumno);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString);
        }
        
        if($form->isSubmitted()){
            $ma->persist($Alumno);
            $ma->flush();
            return $this->redirectToRoute('app_homepage');
        }
            
        return $this->render('BolsaDeTrabajo/FormularioAlumno.html.twig',[
            'form' => $form->createView()
        ]);
    }

}
