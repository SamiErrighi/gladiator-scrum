<?php

namespace User\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/invite/friends")
     * @Template()
     */
    public function inviteAction(Request $request)
    {
        $form = $this->createFormBuilder(null)
            ->add('email', 'text')
            ->getForm();

        if($request->isMethod('POST')) {
            $form->handleRequest($request);
            $email = $form->getData()["email"];
            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('carotte@lp-dw.com')
                ->setTo($email)
                ->setBody($this->renderView('@User/Email/email.txt.twig', array('email' => $email)))
            ;
            $this->get('mailer')->send($message);

            return $this->redirect($this->generateUrl('gladiator__gladiator_index'));
        }

        return [
            "form" => $form->createView()
        ];
    }
}
