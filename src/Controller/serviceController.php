<?php 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class serviceController extends AbstractController
{
    /** 
     * @Route("/", name="main_service")
     */
    public function mainService(Request $request)
    {
        $token = $this->getDoctrine()->getRepository('App:ApiToken')->findOneBy(['id' => 1]);
        $token = $token->getToken();
        
        if($token !== $request->headers->get('X-Auth-Token')) {
            return new JsonResponse(["Unauthorized"]);
            }
            else{
                $result = []; 
                $result = $request->headers->get('var-1') + $request->headers->get('var-2');
                if($result !== null){
                    return new JsonResponse ($result);
                }
        }
    }
}