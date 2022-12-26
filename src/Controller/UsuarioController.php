<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'web_usuario_')]
class UsuarioController
{
    #[Route('/')]
    public function index(): Response{
        return new Response("Implementar");
    }

    #[Route('/salvar', methods: ['POST'])]
    public function salvar(): Response
    {
        return new Response("Implementar bancio");
    }
}