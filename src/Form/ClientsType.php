<?php
namespace App\Form;
// src/Form/ClientsType.php
use App\Entity\Clients;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('nomClient', TextType::class)
						->add('prenomClient', TextType::class)
						->add('emailClient', EmailType::class)
						->add('passwordClient', PasswordType::class)
						->add('adresseClient', TextType::class)
						->add('cpClient', TextType::class)
						->add('villeClient', TextType::class)
						->add('telClient', TextType::class)
						->add('civiliteClient', ChoiceType::class, 
							array('choices' => array(
											'Madame' => 'f',
											'Monsieur' => 'h'),
										'expanded' => true,
										'multiple' => false
										)
						)
						->add('newsletterClient', ChoiceType::class, 
							array('choices' => array(
											'oui' => 'o',
											'non' => 'n'),
										'expanded' => true,
										'multiple' => false
										)
						)
						;
	}
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
							 array('data_class' => Clients::class));
	}
}