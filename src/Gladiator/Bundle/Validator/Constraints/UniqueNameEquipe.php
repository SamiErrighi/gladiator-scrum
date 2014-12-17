<?php
/**
 * Created by PhpStorm.
 * User: sami
 * Date: 17/12/2014
 * Time: 12:14
 */

namespace Gladiator\Bundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueNameEquipe extends Constraint
{
    public $message = 'La chaîne "%string%" contient un caractère non autorisé : elle ne peut contenir que des lettres et des chiffres.';

    public function validatedBy()
    {
        return 'equipe_unique';
    }
} 