<?php
namespace App\Form;
// src/Form/ProduitsType.php
use App\Entity\Produits;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitsType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('idCategorie', EntityType::class, 
								array('class' => Categories::class,
											'choice_label' => 'libelle_categorie',
											'multiple' => false,
										 'expanded' => false))
						->add('refProduit', TextType::class)
						->add('nomProduit', TextType::class)
						->add('prixProduit', textType::class)
						->add('tailleProduit', TextType::class)
						->add('couleurProduit', TextType::class)
						->add('photoProduit', FileType::class)
						->add('descriptionProduit', TextAreaType::class)
						->add('stocksProduit', IntegerType::class)
						->add('sexeProduit', TextType::class)
						;
	}
	
	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
							 array('data_class' => Produits::class));
	}
}