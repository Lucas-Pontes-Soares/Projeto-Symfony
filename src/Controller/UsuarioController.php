<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuario;

#[Route('/', name: 'web_usuario_')]
class UsuarioController extends AbstractController
{
    #[Route('/')]
    public function index(): Response{
        return $this->render('usuario/form.html.twig');
    }

    #[Route('/salvar', methods: ['POST'])]
    public function salvar(Request $request): Response
    {
        $data = $request->request->all();

        $usuario = new Usuario;
        $usuario->setNome($data['nome']);
        $usuario->setEmail($data['email']);

        dump($usuario);

        $doctrine = $this->getDoctrine()->getManager();
        $doctrine->persist($usuario);
        $doctrine->flush();

        if($usuario->getId()){
            return $this->render('usuario/sucesso.html.twig');
        }else {
            return $this->render('usuario/erro.html.twig');
        }
    }
}