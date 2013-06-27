<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \HSYS\MainBundle\Entity\TipoHemocomponente;
use \HSYS\MainBundle\Entity\TipoExclusion;

class CargadorController extends Controller {
//meter mas datos, como de donante y donaciones, unidades y esas cosas.
    public function cargaAction() {
        $em = $this->getDoctrine()->getEntityManager();

        $hemocomponente = new TipoHemocomponente;

        $hemocomponente->setNombre("Sangre Entera");
        $hemocomponente->setDuracion(90);

        $em->persist($hemocomponente);
        $em->flush();
        
        $hemocomponente = new TipoHemocomponente;
        $hemocomponente->setNombre("GRD");
        $hemocomponente->setDuracion(35);

        $em->persist($hemocomponente);
        $em->flush();
        
        $hemocomponente = new TipoHemocomponente;
        $hemocomponente->setNombre("Plaquetas");
        $hemocomponente->setDuracion(5);

        $em->persist($hemocomponente);
        $em->flush();
        
        $hemocomponente = new TipoHemocomponente;
        $hemocomponente->setNombre("Plasma Modificado");
        $hemocomponente->setDuracion(365);

        $em->persist($hemocomponente);
        $em->flush();
        
        $hemocomponente = new TipoHemocomponente;
        $hemocomponente->setNombre("Plasma Fresco Congelado");
        $hemocomponente->setDuracion(365);

        $em->persist($hemocomponente);
        $em->flush();
        
        $hemocomponente = new TipoHemocomponente;
        $hemocomponente->setNombre("Crio");
        $hemocomponente->setDuracion(365);

        $em->persist($hemocomponente);
        $em->flush();
         
        $hemocomponente = new TipoHemocomponente;
        $hemocomponente->setNombre("Sobrenadante de Crio");
        $hemocomponente->setDuracion(365);

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

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Cuestionario");
        $exclusion->setGrado("grave");
        $exclusion->setDuracion("90");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Cuestionario");
        $exclusion->setGrado("permanente");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Serologia");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Examen Fisico");
        $exclusion->setGrado("leve");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Examen Fisico");
        $exclusion->setGrado("grave");
        $exclusion->setDuracion("90");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Examen Fisico");
        $exclusion->setGrado("permanente");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Autoexclusion");
        $exclusion->setDuracion("365");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion por donacion");
        $exclusion->setDuracion("60");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Permanente");
        $exclusion->setDuracion("0");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Poco Volumen");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Mala red venosa");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Lipotimia");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();

        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion Se retira sin donar");
        $exclusion->setDuracion("30");

        $em->persist($exclusion);
        $em->flush();
        
        $exclusion = new TipoExclusion;
        $exclusion->setNombre("Exclusion generica");
        
        $em->persist($exclusion);
        $em->flush();
            
        
        // Carga de Roles.....
        $role = new \HSYS\MainBundle\Entity\Role();
        $role->setName("ROLE_ADMIN");
        $em->persist($role);
        $em->flush();
        
        $role = new \HSYS\MainBundle\Entity\Role();
        $role->setName("ROLE_BIOQUIMICO");
        $em->persist($role);
        $em->flush();
        
        $role = new \HSYS\MainBundle\Entity\Role();
        $role->setName("ROLE_MEDICO");
        $em->persist($role);
        $em->flush();
        
        $role = new \HSYS\MainBundle\Entity\Role();  
        $role->setName("ROLE_PERSONAL");
        $em->persist($role);
        $em->flush();
        
        return array('Listo' => 'tosta hecho');
    }

}

?>
