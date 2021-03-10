<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Form\EmpresaType;
use App\Entity\Empresa;
use App\Entity\OfertaLaboral;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class EmpresaController extends AbstractController{

    /**
     * @Route("/OfertasEmpresas", name="app_ofertasEmpresas")
     */
    public function MostrarEmpresas(){

        $empresas = $this->getDoctrine()->getRepository(Empresa::class)->findAll();
        return $this->render('BolsaDeTrabajo/OfertasDeEmpresas.html.twig', [
            'empresas' => $empresas
        ]);

    }

    /**
     * @Route("/FormularioEmpresa", name="app_FormularioEmpresa")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function FormularioEmpresa(Request $request,ValidatorInterface $validator){

        //doctrine manager para persistir
        $ma = $this->getDoctrine()->getManager();

        //creo un form de Empresa
        $empresa = new Empresa();
        $oferta = new OfertaLaboral();
        $empresa -> addOfertaLaboral($oferta);
        $form = $this->createForm(EmpresaType::class,$empresa);

        
        $form->handleRequest($request);
        $errors = $validator->validate($empresa);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            return new Response($errorsString);
        }
        if($form->isSubmitted()){
            $ma->persist($empresa);
            $ma->flush();
            return $this->redirectToRoute('app_homepage');
        }

        return $this->render('BolsaDeTrabajo/FormularioEmpresa.html.twig',[
                'form' => $form->createView()
            ]);
    }

    

}
