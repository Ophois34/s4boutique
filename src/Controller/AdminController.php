<?php
namespace App\Controller;
//src/Controller/PublicController.php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//annotations pour les routes
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//pour la table des produits
use App\Entity\Produits;
//pour les catégories
use App\Entity\Categories;
//service d'upload de fichiers
use App\Services\MonUpload;
//formulaire produits
use App\Form\ProduitsType;
class AdminController extends Controller
{
	/**
	 * @Route("/ajoutProduit", name="ajoutProduit")
	 */
	public function ajoutProduit(Request $request, MonUpload $up)
	{
		//liaison avec la table des produits
		$produits = new Produits();
		
		//création du formulaire
		$form = $this->createForm(ProduitsType::class, $produits);

		//récupération des données du formulaire
		$form->handleRequest($request);
		//si soumis et validé
		if($form->isSubmitted() && $form->isValid())
		{
			//upload de l'image
			$file = $produits->getPhotoProduit();
			$fileName = $up->upload($file);
			$produits->setPhotoProduit($fileName);
			//enregistrement dans la table
			$em = $this->getDoctrine()->getManager();
			$em->persist($produits);
			$em->flush();

			//retour à l'accueil
			return $this->redirectToRoute('index');
		}
		//affichage du formulaire
		return $this->render('admin/ajoutProduit.html.twig',
									array('form' => $form->createView(),
												'title' => 'Ajouter un produit'));
	}



}