<?php

namespace HSYS\MainBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * DonacionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DonacionRepository extends EntityRepository
{
    
    public function findDonante($criterio, $busqueda, $hasta = NULL){
        $resultado= null;
        //consulta por el id del donante
        if ($criterio == "donante"){
            $resultado = $this->findDonacionPorDonante($busqueda);
        };
        //consulta por el id de la donacion
        if ($criterio == "id") {
            $resultado = $this->findDonacionPorPorId($busqueda);
        };
        //rango de fecha, busqueda es desde.
        if ($criterio == "fecha") {
            $resultado = $this->findDonacionPorRangoDeFecha($busqueda, $hasta);
        };
        
        return $resultado;
}
    
    public function findDonacionPorDonante($donante) {
        $em = $this->getEntityManager();
        $dql = "select d from HSYSMainBundle:Donacion d where d.donante like :donante";

        $query = $em->createQuery($dql);
        $query->setParameter('donante', '%'.$donante.'%');
        
        $donaciones = $query->getResult();
        return $donaciones;
    }
    
    public function findDonacionPorId($id) {
        $em = $this->getEntityManager();
        $dql = "select d from HSYSMainBundle:Donacion d where d.id like :id";

        $query = $em->createQuery($dql);
        $query->setParameter('id', '%'.$id.'%');
        
        $donaciones = $query->getResult();
        return $donaciones;
    }
    //UPPER(u.name)
        public function findDonacionPorRangoDeFecha($desde, $hasta) {
        $em = $this->getEntityManager();
        $dql = "select d from HSYSMainBundle:Donacion d where d.fechextraccion => :desde and d.fechextraccion =< :hasta";

        $query = $em->createQuery($dql);
        $query->setParameter('desde', $desde);
        $query->setParameter('hasta', $hasta);
        
        $donaciones = $query->getResult();
        return $donaciones;
    }
    
    public function findDonacionPorIdBolsa($idbolsa) {
        $em = $this->getEntityManager();
        $dql = "select d from HSYSMainBundle:Donacion d where d.idbolsa like :idbolsa";

        $query = $em->createQuery($dql);
        $query->setParameter('idbolsa', '%'.$idbolsa.'%');
        
        $donaciones = $query->getResult();
        return $donaciones;
    }
    
}
