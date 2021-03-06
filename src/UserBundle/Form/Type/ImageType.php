<?php
namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImageType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
    	$builder
      	->add('file', 'file', array(
		 'label' => false,
			'attr'=> array('class'=>'')
		 ))
    	;
  	}

  	public function setDefaultOptions(OptionsResolverInterface $resolver)
  	{
    	$resolver->setDefaults(array(
      		'data_class' => 'AppBundle\Entity\Image'
    	));
  	}

  	public function getName()
  	{
    	return 'appbundle_imagetype';
  	}
}
