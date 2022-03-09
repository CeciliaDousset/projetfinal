<?php

namespace App\Controller;

use App\Entity\CommandShop;
use App\Repository\CommandShopRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerCommandShopController extends AbstractController
{
    /**
     * @Route("/command/shop", name="command_shop")
     */
    public function index(CommandShopRepository $commandShopRepository): Response
    {
        return $this->render('customer/command_shop.html.twig', [
            'command_shops' => $commandShopRepository->findAll(),
        ]);
    }


    /**
     * @Route("/command/{id}", name="command_show", methods={"GET"})
     */
    public function show(CommandShop $commandShop): Response
    {
        return $this->render('customer/command_show.html.twig', [
            'command_shop' => $commandShop,
        ]);
    }
}
