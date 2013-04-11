<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class DonacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('fechextraccion')
                ->add('idbolsa')
                ->add('hospital')
                ->add('flebotomia','choice', array('choices' => array(
                    'Brazo Izquierdo' => 'Brazo Izquierdo',
                    'Brazo Derecho' => 'Brazo Derecho'
                )))
                ->add('puncion')
                ->add('reaccionpostextraccion')
                ->add('comentario');      
    }
    
    public function getName() {
        return 'Donacion_form';
    }
}
?>
