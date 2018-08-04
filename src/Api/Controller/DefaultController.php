<?php
namespace App\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="api")
     */
    public function indexAction(Request $request)
    {
        $index_response = ["Hi !", "Welcome", "to the", "Be-Api new restful Api", "for Dev."];
        $data = $this->get('jms_serializer')->serialize($index_response, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
