<?php

namespace App\Controller\Api;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Usuario;

#[Route('/api/v1', name: 'api_v1_usuario_')]
class UsuarioController extends AbstractController
{
    #[Route('/lista', methods: ['GET'], name: 'lista')]
    public function lista(): JsonResponse
    {
        $doctrine = $this->getDoctrine()->getRepository(Usuario::class);
        return new JsonResponse($doctrine->pegarTodos());
    }

    #[Route('/cadastrar', methods: ['POST'], name: 'cadastrar')]
    public function cadastra(Request $request, ManagerRegistry $doctrine): Response
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
            return new Response('ok', 200);
        }else {
            return new Response('error', 404);
        }
    }
}