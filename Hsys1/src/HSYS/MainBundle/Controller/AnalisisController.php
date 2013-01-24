<?php

namespace HSYS\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AnalisisController extends Controller
{
    public function indexAction() {
        return $this->render('HSYSMainBundle:Analisis:index.html.twig');
    }
}
