<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DonanteType extends AbstractType
{
   
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nomapp')
                ->add('dni', 'text'
                )
//                ->add('factorsang','choice',array('choices'=> (\HSYS\MainBundle\Entity\factorsang::$factorsang), 'empty_value' =>'SELECCIONE UNO' ))
//                ->add('fechnaci')
                ->add('fechnaci', 'date', array(
                    'widget' => 'choice',
                    'empty_value' => array('year' => 'AAAA', 'month' => 'MM', 'day' => 'DD'),
                    'years' => range(1902,2037),
                    'months' => range(1,12),
                    'format' => 'dd-MM-yyyy',
                    'pattern' => '{{ day }}-{{ month }}-{{ year }}'
                ))
                ->add('sexo', 'choice', array(
                    'choices' => array(
                        'Masculino' => 'Masculino',
                        'Femenino' => 'Femenino',
                        'Otro' =>   'Otro',
                        ),
                    'empty_value' => 'SELECCIONE UNA',
                ))
                ->add('ocupacion', 'choice', array('choices'=>(\HSYS\MainBundle\Entity\ocupacion::$ocupacion),'empty_value'=>'SELECCIONE UNA'))
                ->add('estadocivil', 'choice', array(
                    'choices' => array(
                        'Soltero'=> 'Soltero',
                        'Casado'=> 'Casado',
                        'Divorciado'=> 'Divorciado',
                        'Viudo'=> 'Viudo',
                        'Otro'=> 'Otro',
                    ),
                    'empty_value' => 'SELECCIONE UNA',
                ))
                ->add('paisnac')
                ->add('provnac')
                ->add('domicilio')
                ->add('codpostal')
                ->add('ciudad')
                ->add('provincia')
                ->add('pais')
                ->add('telefono')
                ->add('celular')
                ->add('email')
                ->add('donantevoluntario','checkbox', array(
                    'required' => false
                ))
                ;
    
    }
    
    public function getName() {
        return 'Donante_form';
    }
}
?>
