<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DonanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nomapp')
                ->add('dni')
                ->add('factorsang')
                ->add('fechnaci', 'date', array(
                    'widget' => 'choice',
                    'empty_value' => array('year' => 'AAAA', 'month' => 'MM', 'day' => 'DD'),
                    'years' => range(1902,2037),
                    'months' => range(1,12),
                    'format' => 'dd-MM-yyyy',
                    'pattern' => '{{ day }}-{{ month }}-{{ year }}'
                ))
                ->add('sexo')
                ->add('ocupacion')
                ->add('estadocivil')
                ->add('paisnac')
                ->add('provnac')
                ->add('domicilio')
                ->add('ciudad')
                ->add('provincia')
                ->add('pais')
                ->add('telefono')
                ;
                
    }
    
    public function getName() {
        return 'Donante_form';
    }
}
?>
