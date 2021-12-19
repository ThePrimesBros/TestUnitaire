<?php

namespace App\Controller;

use App\Entity\Item;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ItemController extends AbstractController
{
    #[Route('/item', name: 'item')]
    public function index(): Response
    {
        $repository=$this->getDoctrine()->getRepository(Item::class);
        $movies=$repository->findall();
        return$this->handleView($this->view($movies));
    }
}
