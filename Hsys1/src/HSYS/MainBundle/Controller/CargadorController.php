<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \HSYS\MainBundle\Entity\TipoHemocomponente;
use \HSYS\MainBundle\Entity\TipoExclusion;

class CargadorController extends Controller {

    public function cargaAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $hemocomponente = new TipoHemocomponente;

        $hemocomponente->setNombre("Sangre Entera");
        $hemocomponente->setDuracion(90);

        $em->persist($hemocomponente);
        $em->flush();

        $hemocomponente->setNombre("Globulos Rojos");
        $hemocomponente->setDuracion(90);

        $em->persist($hemocomponente);
        $em->flush();

        $hemocomponente->setNombre("Plaquetas");
        $hemocomponente->setDuracion(30);

        $em->persist($hemocomponente);
        $em->flush();

        $hemocomponente->setNombre("Sobrenadante de Crio");
        $hemocomponente->setDuracion(365);

        $em->persist($hemocomponente);
        $em->flush();

        $hemocomponente->setNombre("Plasma fresco");
        $hemocomponente->setDuracion(20);

        $em->persist($hemocomponente);
        $em->flush();

        $hemocomponente->setNombre("Plasma Modificado");
        $hemocomponente->setDuracion(60);

        $em->persist($hemocomponente);
        $em->flush();

        //--------------- ahora los Tipo de exlusion ---------------------//
        //leve , grave, permanente
        $exclusion = new TipoExclusion;

        $exclusion->setNombre("Exclusion Cuestionario");
        $exclusion->setGrado("leve");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Cuestionario");
        $exclusion->setGrado("grave");
        $exclusion->setDuracion("90");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Cuestionario");
        $exclusion->setGrado("permanente");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Serologia");
        $exclusion->setGrado("leve");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Serologia");
        $exclusion->setGrado("grave");
        $exclusion->setDuracion("90");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Serologia");
        $exclusion->setGrado("permanente");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Examen Fisico");
        $exclusion->setGrado("leve");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Examen Fisico");
        $exclusion->setGrado("grave");
        $exclusion->setDuracion("90");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Examen Fisico");
        $exclusion->setGrado("permanente");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Autoexclusion");
        $exclusion->setGrado("grave");
        $exclusion->setDuracion("365");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion por donacion");
        $exclusion->setGrado("leve");
        $exclusion->setDuracion("60");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion->setNombre("Exclusion Permanente");
        $exclusion->setGrado("permanente");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();
        
        
        return "todo listo.";
    }

}

?>
