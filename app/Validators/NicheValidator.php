<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class NicheValidator.
 *
 * @package namespace App\Validators;
 */
class NicheValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_MODEL  => [
            'niche' =>  'exists:spiecie,niche'
        ]
    ];
}
