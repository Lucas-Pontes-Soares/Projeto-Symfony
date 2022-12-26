<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Usuario;

#[Route('/', name: 'web_usuario_')]
class UsuarioController extends AbstractController
{
    #[Route('/')]
    public function index(): Response{
        return $this->render('usuario/form.html.twig');
    }

    #[Route('/salvar', methods: ['POST'])]
    public function salvar(Request $request, ManagerRegistry $doctrine): Response
    {
        $data = $request->request->all();

        $usuario = new Usuario;
        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);

        dump($usuario);

        $entityManager = $doctrine->getManager();
        $entityManager->persist($usuario);
        $entityManager->flush();

        if($usuario->getId()){
            return $this->render('usuario/sucesso.html.twig');
        }else {
            return $this->render('usuario/erro.html.twig');
        }
    }
}