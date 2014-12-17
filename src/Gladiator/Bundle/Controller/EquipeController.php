<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 17/12/2014
 * Time: 09:28
 */

namespace Gladiator\Bundle\Controller;

use Gladiator\Bundle\Entity\Equipe;
use Gladiator\Bundle\Form\Type\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/equipe")
 */
class EquipeController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $equipes = $this->getDoctrine()
            ->getRepository('GladiatorBundle:Equipe')
            ->findAll()
        ;

        return [
            "equipes" => $equipes
        ];
    }

    /**
     * @Route("/create")
     * @Template()
     */
    public function createAction(Request $request)
    {
        $equipe = new Equipe();
        $equipe->setUser($this->getUser());
        $form = $this->createForm(new EquipeType(), $equipe);

        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            if($form->isValid()) {
                $em =  $this->getDoctrine()->getManager();
                $em->persist($form->getData());
                $em->flush();
                $this->get('session')->getFlashBag()->add("success", "Equipe ajoutée.");
                return $this->redirect($this->generateUrl('gladiator__equipe_index'));
            }
        }
        return [
            "form" => $form->createView()
        ];
    }

    /**
    * @Route("/update/{id}")
    * @Template()
    */
    public function updateAction($id, Request $request) 
    {
        $equipe = $this->getDoctrine()
                ->getRepository('GladiatorBundle:Equipe')
                ->find($id);

        if ($equipe == null) {
            $this->get('session')->getFlashBag()->add("error", "L'équipe n'existe pas.");
            return $this->redirect($this->generateUrl('gladiator__equipe_index'));
        }

            $form = $this->createForm(new EquipeType(), $equipe);

            if($request->isMethod('POST')) {
                $form->handleRequest($request);

                if ($form->isValid()) 
                {
                    //enregistrer l'objet en bdd
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($form->getData());
                    $em->flush();
                    
                    $this->get('session')->getFlashBag()->add('success', "L'équipe a été modifiée.");
                }
                return $this->redirect($this->generateUrl('gladiator__equipe_index'));
            }

        return [
            "form" => $form->createView()
        ];
    }

} 