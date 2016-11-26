<?php

/**
 * Description of adherantType
 *
 * @author Amaar
 */

namespace Oxygen\SalleDeSportBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class adherentType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' => 'username'
            ))
            ->add('email', 'email', array(
                'label' => 'email'
            ))
            ->add('password', 'password', array(
                'label' => 'password'
            ))
            ->add('firstName', 'text',array(
                'label' => 'firstName'
            ))
            ->add('lastName', 'text',array(
                'label' => 'lastName'
            ))
            ->add('age', 'integer',array(
                'label' => 'age'
            ))
     
        ;
    }
    
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Oxygen\SalleDeSportBundle\Entity\Adherent',
        ));
    }
    
   public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }

//put your code here
}
