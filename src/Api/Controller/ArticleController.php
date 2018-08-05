<?php
namespace App\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Api\Entity\Article;

class ArticleController extends Controller
{

    /**
     * @Route("/articles/{id}", name="article_show")
     */
    public function show($id)
    {
        $article = $this->getDoctrine()->getRepository('App:Article')->findById($id);
        $data = $this->get('jms_serializer')->serialize($article, 'json');
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/articles/listing", name="article_all")
     */
    public function listing() 
    {
        $article = $this->getDoctrine()->getRepository('App:Article')->findAll();
        $data = $this->get('jms_serializer')->serialize($article, 'json');
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/articles", name="article_create")
     */
    public function create(Request $request) 
    {
        $data = $request->getContent();
        $article = $this->get('jms_serializer')->deserialize($data, 'App\Api\Entity\Article', 'json');
        $em = $this->getDoctrine()->getManager();
        $em->persist($article);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }
}
