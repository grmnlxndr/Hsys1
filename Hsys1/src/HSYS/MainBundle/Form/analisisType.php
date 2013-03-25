<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class analisisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
//                ->add('fechanalisis', 'date', array(
//                    'widget' => 'choice',
//                    'empty_value' => array('year' => 'AAAA', 'month' => 'MM', 'day' => 'DD'),
//                    'years' => range(1902,2037),
//                    'months' => range(1,12),
//                    'format' => 'dd-MM-yyyy',
//                    'pattern' => '{{ day }}-{{ month }}-{{ year }}'
//                ))
                ->add('chhai','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('cheia','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('anticore','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('hbsag','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('hcvagac','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('hivac','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('agp2y','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('htlv','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('brucelosis','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('sifilis','choice',array('choices'=>array('R'=>'R','NR'=>'NR'),'empty_value'=>'SELECCIONE'))
                ->add('abo','choice',array('choices'=>array('AB'=>'AB','A'=>'A','B'=>'B','0'=>'0'),'empty_value'=>'SELECCIONE'))
                ->add('rhd','choice',array('choices'=>array('-'=>'-','+'=>'+'),'empty_value'=>'SELECCIONE'))
                ->add('du','choice',array('choices'=>array('-'=>'-','+'=>'+'),'empty_value'=>'SELECCIONE'))
                ->add('cde')
                ->add('fenotipo')
                ->add('pci','choice', array('choices'=>array('-'=>'-','+'=>'+'),'empty_value'=>'SELECCIONE'))
                ->add('reactivo', 'choice', array('choices' => array('SI' => 'SI','NO' => 'NO'),'empty_value' => 'SELECCIONE',))
                ;      
    }
    
    public function getName() {
        return 'Donacion_form';
    }
}
?>
