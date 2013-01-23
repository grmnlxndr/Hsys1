<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class altaDonanteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nomapp')
                ->add('dni')
                ->add('factorsang')
                ->add('fechnaci')
                ->add('sexo')
                ->add('ocupacion')
                ->add('estadocivil');
                
    }
    
    public function getName() {
        return 'altaDonante_form';
    }
}
?>
