<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 17/12/2014
 * Time: 12:17
 */

namespace Gladiator\Bundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\RequestStack as Request;

class UniqueNameEquipeValidator extends ConstraintValidator
{
    private $em;
    private $user;
    private $request;
    private $id;

    public function __construct(EntityManager $em, SecurityContext $user, Request $request)
    {
        $this->em = $em;
        $this->user = $user;
        $this->request = $request;
        $this->checkMethod();
    }

    public function validate($value, Constraint $constraint)
    {
        $user = $this->user->getToken()->getUser();

        if(null == $this->id) {
            $result = $this->em
                ->getRepository('GladiatorBundle:Equipe')
                ->isUnique($user->getId(), $value)
            ;

        }else {
            $result = $this->em
                ->getRepository('GladiatorBundle:Equipe')
                ->isUniqueUpdate($user->getId(), $value, $this->id)
            ;
        }


        if(!$result) {
            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }
    }

    public function checkMethod()
    {
        if( $this->request->getCurrentRequest()->attributes->get("id")) {
            $this->id = $this->request->getCurrentRequest()->attributes->get("id");
        }
    }
} 