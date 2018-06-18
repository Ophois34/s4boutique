<?php
namespace App\Controller;
// src/Controller/MenuController.php
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
//pour la liste des catégories
use App\Entity\Categories;
class MenuController extends Controller
{
	public function navbar(AuthorizationCheckerInterface $authChecker)
	{
		//si l'utilisateur est loggué et possède les droits ROLE_ADMIN
		if($authChecker->isGranted('ROLE_ADMIN'))
		{
			$liens = array(
				array('href' => 'panier', 
							'lib' => 'Panier',
							'icon' => 'fas fa-shopping-cart'),
				array('href' => 'clients', 
							'lib' => 'Clients',
							'icon' => 'fas fa-user'
						),
				array('href' => 'ajoutProduit', 
							'lib' => 'Ajouter un produit',
							'icon' => 'fas fa-plus-circle'),
				array('href' => 'logout', 
							'lib' => 'GoodBye',
							'icon' => 'fas fa-power-off')
				/* etc. */
			);
		}
		//si loggué et ROLE_USER
		else if($authChecker->isGranted('ROLE_USER'))
		{
			$liens = array(
				array('href' => 'panier', 
							'lib' => 'Panier',
							'icon' => 'fas fa-shopping-cart'),
				array('href' => 'profil', 'lib' => 'Profil',
							'icon' => 'fas fa-plus-circle'),
				array('href' => 'contact', 
							'lib' => 'Contact',
							'icon' => 'fas fa-envelope'),
				array('href' => 'logout', 
							'lib' => 'Quitter',
							'icon' => 'fas fa-power-off')
			);				
		}
		// anonyme
		else
		{
			$liens = array(
				array('href' => 'inscription', 
							'lib' => 'Inscription',
							'icon' => 'fas fa-user-plus'),
				array('href' => 'login', 
							'lib' => 'Connexion',
							'icon' => 'fas fa-sign-in-alt'),
				array('href' => 'contact', 
							'lib' => 'Contact',
							'icon' => 'fas fa-envelope'
						)
			);
		}		
		$categories = $this->getDoctrine()->getRepository(Categories::class);
		return $this->render('menu/navbar.html.twig',
						array('liens' => $liens,
									'categories' => $categories->findAll()));				
	}
}