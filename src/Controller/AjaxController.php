<?php
namespace App\Controller;
//src/Controller/PublicController.php
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
//annotations pour les routes
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//pour les catégories
use App\Entity\Panier;
class AjaxController extends Controller
{
	/**
	 * @Route("/suppPanier", name="suppPanier")
	 */
	public function suppPanier(Request $request)
	{
		$id = $request->get('id');
		$panier = $this->getDoctrine()->getRepository(Panier::class);
		$lignePanier = $panier->find($id);
		//Entity Manager
		$em = $this->getDoctrine()->getManager();
		$em->remove($lignePanier);
		$em->flush();
		return new Response(json_encode(['msg' => '<p class="alert alert-success">élément supprimé</p>']));
	} 

	/**
	 * @Route("/modifPanier", name="modifPanier")
	 */
	public function modifPanier(Request $request)
	{
		$id = $request->get('id');
		$value = $request->get('value');
		$em = $this->getDoctrine()->getManager();
		$panier = $em->getRepository(Panier::class)->find($id);
		//Entity Manager
		$panier->setQuantiteProduit($value);
		$em->flush();

		return new response(json_encode(['msg' => '<p class="alert alert-success">Quantité modifiée</p>']));
	}

}