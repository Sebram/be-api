<?php
namespace App\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function index(Request $request)
    {
    	$date = date("d-m-Y H:s:i", time());
        $index_response = array( "date"=>$date,"appname"=>"BE API", "reponse"=>"BE HAPPY*API. Hi ! Welcome to the Be-Api new restful Api for Developpers.", "version"=>"1.0",  "code"=>"200" );
        $data = $this->get('jms_serializer')->serialize($index_response, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
