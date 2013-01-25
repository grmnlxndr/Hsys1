<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class analisisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('fechanalisis')
                ->add('chhai','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('cheia','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('anticore','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('hbsag','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('hcvagac','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('hivac','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('agp2y','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('htlv','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('brucelosis','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('sifilis','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('abo','choice',array('choices'=>array('AB'=>'AB','A'=>'A','B'=>'B','0'=>'0'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('rhd','choice',array('choices'=>array('-'=>'-','+'=>'+'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('du')
                ->add('cde')
                ->add('fenotipo')
                ->add('pci','choice', array('choices'=>array('-'=>'-','+'=>'+'),'empty_value'=>'SELECCIONE UNA OPCION'))
                ->add('reactivo', 'choice', array(
                    'choices' => array(
                        'SI' => 'SI',
                        'NO' => 'NO',
                        ),
                    'empty_value' => 'SELECCIONE UNA OPCION',
                ))
                ;      
    }
    
    public function getName() {
        return 'Donacion_form';
    }
}
?>
