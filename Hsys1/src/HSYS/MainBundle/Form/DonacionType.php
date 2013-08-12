<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DonacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('numdedonacion','integer')
                ->add('tipodonacion','choice', array('choices' => array (
                    'Normal' => 'Normal',
                    'Plaquetas Aféresis' => 'Plaquetas Aféresis',
                    'Eritroféresis' => 'Eritroféresis',
                    'Plasma Aféresis' => 'Plasma Aféresis',
                    'Stem Cells' => 'Stem Cells',
                    'Sangría Terapéutica' => 'Sangría Terapéutica',
                    'Autóloga' => 'Autóloga'
                )))
                ->add('fechextraccion','date', array(
                    'widget' => 'choice',
                    'format' => 'dd-MM-yyyy',
                    ))
                ->add('Establecimiento','entity', array(
                    'class' => 'HSYSMainBundle:Establecimiento',
                    'property' => 'EstDesc',
                ))
                ->add('respCuestionario','entity', array(
                    'class' => 'HSYSMainBundle:Usuario',
                    'property' => 'username',
                ))
                ->add('peso','number')
                ->add('tensionarterial','number')
                ->add('tensionarterialmax','number')
                ->add('pulso','integer')
                ->add('temperatura','number')
                ->add('hto','number')
                ->add('inspeccionbrazos','text', array(
                    'data' => 'Normal'
                ))
                ->add('obs','textarea')
                ->add('respFisico','entity', array(
                    'class' => 'HSYSMainBundle:Usuario',
                    'property' => 'username',
                ))
                ->add('idbolsa','integer')
                ->add('nrolote','integer')
                ->add('vencimientobolsa','date', array(
                    'widget' => 'choice',
                    'format' => 'dd-MM-yyyy',
                ))
                ->add('TipoBolsa','entity', array(
                    'class' => 'HSYSMainBundle:TipoBolsa',
                    'property' => 'nombre',
                ))
                ->add('MarcaBolsa','entity', array(
                    'class' => 'HSYSMainBundle:MarcaBolsa',
                    'property' => 'nombre',
                ))
                ->add('Anticoagulante','entity', array(
                    'class' => 'HSYSMainBundle:Anticoagulante',
                    'property' => 'nombre',
                ))
                
                ;      
    }
    
    public function getName() {
        return 'Donacion_form';
    }
}
?>
