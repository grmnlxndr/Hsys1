<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LocalidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre')
                ->add('detalle')
                ->add('Provincia','entity', array(
                    'class' => 'HSYSMainBundle:Provincia',
                    'property' => 'completo',
                    'required' => true,
                ));    
    }
    
    public function getName() {
        return 'Tabla_form';
    }
}
?>
