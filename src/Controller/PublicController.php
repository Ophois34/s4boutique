<?php
namespace App\Controller;
//src/Controller/PublicController.php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//annotations pour les routes
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
// formulaire contact
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//pour la table des produits
use App\Entity\Produits;
//pour les catégories
use App\Entity\Categories;
//Pour le panier
use App\Entity\Panier;
class PublicController extends Controller
{
	/**
	* @Route("/", 
	* name="index")
	*/
	public function index()
	{
		return $this->render('public/index.html.twig',
						array('title' => 'Bienvenue chez nous'));
	}

	/**
	* @Route("/mentions", 
	* name="mentions")
	*/
	public function mentions()
	{
		return $this->render('public/mentions.html.twig');
	}

	/**
	* @Route("/produits/{cat}",
	* name="produits") 
	*/
	public function produits($cat)
	{
		//appel du modèle Produits
		$produits = $this->getDoctrine()->getRepository(Produits::class);
		//liste de tous les produits (SELECT * FROM produits)
		$listeProduits = $produits->findByIdCategorie($cat);

		return $this->render('public/produits.html.twig',
									array('title' => 'Nos produits',
												'produits' => $listeProduits));
	}
	/**
	* @Route("/detailProduit/{id}",
	* name="detailProduit",
	* requirements={"id":"\d+"},
	* defaults={"id":1})
	*/
	public function detailProduit($id)
	{
		//appel du modèle Produits
		$produits = $this->getDoctrine()->getRepository(Produits::class);
		//infos du produit (SELECT * FROM produits where id= :id)
		$detailProduit = $produits->find($id);
		//return new Response('produit '.$id);
		return $this->render('public/detailProduit.html.twig',
									array('title' => $detailProduit->getNomProduit(), 'detail' => $detailProduit));
	}

	/**
	* @Route("/ajoutPanier",
	* name="ajoutPanier") 
	*/
	public function ajoutPanier(REQUEST $request)
	{ 
		//appel du modèle Produits
		$produits = $this->getDoctrine()->getRepository(Produits::class);
		//infos du produit (SELECT * FROM produits where id= :id)
		$produit = $produits->find($request->get('idProduit'));
		//Entity Manager
		$em = $this->getDoctrine()->getManager();
		//création du panier
		$panier = new Panier();
		//la date et l'heure actuelle format BDD
		$panier->setDatePanier(new \DateTime('now'));
		//l'utilisateur loggué
		$user = $this->getUser();
		$panier->setIdClient($user->getId());
		// l'id du produit doit être un objet de type Produit
		$panier->setIdProduit($produit);
		//la quantité
		$panier->setQuantiteProduit($request->get('quantite'));
		// enregistrement de l'objet
		$em->persist($panier);	
		// enregistrement dans la BDD 
		$em->flush();
		return new Response('OK');
	}

	/**
	 * @route("/panier", name="panier")
	 */
	public function panier()
	{
		$user = $this->getUser()->getId();
		//appel du modèle Panier
		$panier = $this->getDoctrine()->getRepository(Panier::class);
		$produits = $panier->findByIdClient($user);
		return $this->render('public/panier.html.twig', 
									array('title' => 'Mon panier',
											  'produits' => $produits));
	}

	/**
	* @Route("/contact", name="contact")
	*/
	public function contact(Request $request)
	{
		$defaultData = array('message' => 'Contactez nous');
    $form = $this->createFormBuilder($defaultData)
        ->add('nom', TextType::class)
        ->add('email', EmailType::class)
        ->add('message', TextareaType::class)
        ->add('send', SubmitType::class, 
      				 array('label' => 'Envoyer'))
        ->getForm();

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $data = $form->getData();
        //envoi mail...
    }

		return $this->render('public/contact.html.twig', 
									array('title' => 'Contactez nous',
												'form' => $form->createView())
		);
	} 

}