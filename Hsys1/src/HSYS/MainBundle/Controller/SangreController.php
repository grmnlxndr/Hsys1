<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SangreController extends Controller
{
    public function indexAction() {
        return $this->render('HSYSMainBundle:Sangre:index.html.twig');
    }
    
    
}
