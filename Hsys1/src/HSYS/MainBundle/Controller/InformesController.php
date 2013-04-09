<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InformesController extends Controller
{
    public function indexAction(){
        return $this->render('HSYSMainBundle:Informes:index.html.twig');
    }
}
