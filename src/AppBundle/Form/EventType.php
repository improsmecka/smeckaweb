<?php 

namespace AppBundle\Form;

use AppBundle\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
  
        $builder
            //->add('email', EmailType::class)
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('action', TextType::class)
            ->add('faction', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Event::class,
        ));
    }
}
