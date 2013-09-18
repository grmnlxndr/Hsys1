<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProvinciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombre')
                ->add('detalle')
                ->add('Pais','entity', array(
                    'class' => 'HSYSMainBundle:Pais',
                    'property' => 'nombre',
                    'required' => true,
                ));    
    }
    
    public function getName() {
        return 'Tabla_form';
    }
}
?>
