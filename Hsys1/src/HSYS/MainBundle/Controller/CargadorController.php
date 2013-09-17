<?php

namespace HSYS\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \HSYS\MainBundle\Entity\TipoHemocomponente;
use \HSYS\MainBundle\Entity\TipoExclusion;
use JMS\SecurityExtraBundle\Annotation\Secure;

class CargadorController extends Controller {

//meter mas datos, como de donante y donaciones, unidades y esas cosas.
    /*
     * 	@Secure(roles="ROLE_ADMIN")
     */
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
        
        // Carga de donante 1
        $donante = new \HSYS\MainBundle\Entity\Donante();
        $donante->setDni('D0');
        $donante->setNomapp('NO ESPECIFICADO');
        $donante->setBaja(false);
        $em->persist($donante);
        $em->flush();
        
        // Carga de marca de Bolsas
        $marca = new \HSYS\MainBundle\Entity\MarcaBolsa();
        $marca->setNombre('Baxter');
        $em->persist($marca);
        $em->flush();
        
        $marca = new \HSYS\MainBundle\Entity\MarcaBolsa();
        $marca->setNombre('Grifols');
        $em->persist($marca);
        $em->flush();
        
        $marca = new \HSYS\MainBundle\Entity\MarcaBolsa();
        $marca->setNombre('MS');
        $em->persist($marca);
        $em->flush();
        
        $marca = new \HSYS\MainBundle\Entity\MarcaBolsa();
        $marca->setNombre('Kawasumi');
        $em->persist($marca);
        $em->flush();
        
        $marca = new \HSYS\MainBundle\Entity\MarcaBolsa();
        $marca->setNombre('Rivero');
        $em->persist($marca);
        $em->flush();
        
        $marca = new \HSYS\MainBundle\Entity\MarcaBolsa();
        $marca->setNombre('Terumo');
        $em->persist($marca);
        $em->flush();
        
        // Carga de Anticoagulantes
        $ant = new \HSYS\MainBundle\Entity\Anticoagulante();
        $ant->setNombre('ACD-A');
        $em->persist($ant);
        $em->flush();
        
        $ant = new \HSYS\MainBundle\Entity\Anticoagulante();
        $ant->setNombre('CPD-A');
        $em->persist($ant);
        $em->flush();
        
        $ant = new \HSYS\MainBundle\Entity\Anticoagulante();
        $ant->setNombre('SAG-Manitol');
        $em->persist($ant);
        $em->flush();
        
        // Carga de tipo bolsa
        $bolsa = new \HSYS\MainBundle\Entity\TipoBolsa();
        $bolsa->setNombre('Simple');
        $em->persist($bolsa);
        $em->flush();
        
        $bolsa = new \HSYS\MainBundle\Entity\TipoBolsa();
        $bolsa->setNombre('Doble');
        $em->persist($bolsa);
        $em->flush();
        
        $bolsa = new \HSYS\MainBundle\Entity\TipoBolsa();
        $bolsa->setNombre('Triple');
        $em->persist($bolsa);
        $em->flush();
        
        $bolsa = new \HSYS\MainBundle\Entity\TipoBolsa();
        $bolsa->setNombre('Cuádruple');
        $em->persist($bolsa);
        $em->flush();
        
        $bolsa = new \HSYS\MainBundle\Entity\TipoBolsa();
        $bolsa->setNombre('Niños');
        $em->persist($bolsa);
        $em->flush();
        
        // Carga Hospitales
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Perrando');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Gral. San Martin');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Las Breñas');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Charata');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Hermoso Campo');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Castelli');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Villa Ángela');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Tres Isletas');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Las Palmas');
        $em->persist($hosp);
        $em->flush();
        
        $hosp = new \HSYS\MainBundle\Entity\Hospital();
        $hosp->setNombre('Colectas Externas');
        $em->persist($hosp);
        $em->flush();
        
        // Carga Ocupaciones
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Jubilado');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Ama de Casa');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Empleado Público');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Secretario');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Médico');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Comerciante');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Trabajador Independiente');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Empleado Privado');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Desocupado');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Estudiante');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Estudiante Universitario');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Docente');
        $em->persist($ocu);
        $em->flush();
        
        $ocu = new \HSYS\MainBundle\Entity\ocupacion();
        $ocu->setNombre('Docente Universitario');
        $em->persist($ocu);
        $em->flush();
        

        return array('Listo' => 'tosta hecho');
    }

}

?>
