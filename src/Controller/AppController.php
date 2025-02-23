<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\VideoRepository;
use App\Repository\MemberRepository;
use App\Repository\ProductRepository;
use App\Repository\InnovationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\SerializerInterface;

class AppController extends AbstractController
{
    #[Route('/', name: 'app')]
    public function index(SerializerInterface $serializer,
        PostRepository $postRepo,
        ProductRepository $productRepo,
        MemberRepository $memberRepo,
        VideoRepository $videoRepo,
        InnovationRepository $innovRepo,
    ): Response
    {
        $posts = $postRepo->findAll();
        $products = $productRepo->findAll();
        $members = $memberRepo->findAll();
        $videos = $videoRepo->findAll();
        $innovations = $innovRepo->findAll();
        //$p = $serializer->serialize($posts, 'json');
        //dd($p);
        //dd($posts);
        //dd($posts, $products, $members, $videos, $innovations);

        return $this->render('index.html.twig', [
            'controller_name' => 'AppController',
            'posts' => $posts,
            'products' => $products,
            'members' => $members,
            'videos' => $videos,
            'innovations'=> $innovations
        ]);
    }
}
