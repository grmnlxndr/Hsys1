<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InicioController extends Controller
{
    public function indexAction() {
        return $this->render('HSYSMainBundle:Inicio:index.html.twig');
    }
}
