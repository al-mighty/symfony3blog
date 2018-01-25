<?php
/**
 * Created by PhpStorm.
 * User: progi
 * Date: 25.01.2018
 * Time: 0:38
 */

namespace PageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function listAction(){
        $pageRepo = $this->getDoctrine()->getRepository('PageBundle:Page');
        $pages = $pageRepo->findAll();
//        return new Response('this');

        return $this->render('PageBundle:Page:list.html.twig',[
                'pages' => $pages,
            ]
        );
    }

    public function viewAction($id){
        return new Response('this');
    }

}