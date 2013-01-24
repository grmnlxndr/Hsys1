<?php
namespace HSYS\MainBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class analisisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('fechanalisis')
                ->add('chhai')
                ->add('cheia')
                ->add('anticore')
                ->add('hbsag')
                ->add('hcvagac')
                ->add('hivac')
                ->add('agp2y')
                ->add('htlv')
                ->add('brucelosis')
                ->add('sifilis')
                ->add('abo')
                ->add('rhd')
                ->add('du')
                ->add('cde')
                ->add('fenotipo')
                ->add('pci')
                ;      
    }
    
    public function getName() {
        return 'Donacion_form';
    }
}
?>
