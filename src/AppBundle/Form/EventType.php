<?php 

namespace AppBundle\Form;

use AppBundle\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Vich\UploaderBundle\Form\Type\VichFileType;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
  
        $builder            
            ->add('title', TextType::class)
            ->add('description', TextType::class)
            ->add('action', TextType::class)
            
            
         
        ;
        
        
        $builder->add('faction', ChoiceType::class, array(
    'choices'  => array(
        'Vydry' => 1,
        'Lišky' => 2,
        'Liškovydřátka' => 3,
    ),
));
        
        $builder->add('imageFile', VichFileType::class, [
            'required' => true,
            'allow_delete' => false, 
           
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Event::class,
        ));
    }
}
