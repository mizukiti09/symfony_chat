<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Contribute;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Contribute::class);
        $result = $repository->getResultContribute();
        $userData = $this->getUser();
        
        if($userData == null){
            $user = 'not logined...';
            $u_id = 0;
        } else {
            $user = 'logined: '. $userData->getUsername();
            $u_id = $userData->getId();
        }

        
        return $this->render('index/index.html.twig', [
            'user' => $user,
            'user_id' => $u_id,
            'userData' => $userData,
        ]);
    }

    
    
}
