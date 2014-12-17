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

class UniqueNameEquipeValidator extends ConstraintValidator
{
    private $em;
    private $user;

    public function __construct(EntityManager $em, SecurityContext $user)
    {
        $this->em = $em;
        $this->user = $user;
    }

    public function validate($value, Constraint $constraint)
    {
        $user = $this->user->getToken()->getUser();
        $result = $this->em
            ->getRepository('GladiatorBundle:Equipe')
            ->isUnique($user->getId(), $value)
        ;

        if(!$result) {
            $this->context->addViolation($constraint->message, array('%string%' => $value));
        }
    }
} 