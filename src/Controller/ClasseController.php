<?php

namespace App\Controller;

use App\Entity\Classe;
use App\Form\ClasseType;
use App\Repository\ClasseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClasseController extends AbstractController
{
    #[Route('/classe', name: 'app_classe')]
    public function index(ClasseRepository $repo): Response
    {
        // dd($repo->findAll());
        return $this->render('classe/index.html.twig', [
            'controller_name' => 'ClasseController',
            'classe' => $repo->findAll()
        ]);
    }
    /**
     * @Route("/delete/{id}",name="classe_delete");
     * 
    *@return Response;
     */
    
    public function delete(Classe $classe,ClasseRepository $repo)
    {
        $repo->remove($classe,true);

        return new Response("delete");
    }

    #[Route('/addClasse', name:'add_classe')]
    public function addClasse(Request $request,EntityManagerInterface $em):Response
    {
        $classe = new Classe;
        $form = $this->createForm(ClasseType::class, $classe);
        // dump($form);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            
            $em->persist($classe);
            $em->flush();
        }
        // dd($repo->findAll());
        return $this->render('classe/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
