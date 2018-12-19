<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class SpiecieValidator.
 *
 * @package namespace App\Validators;
 */
class SpiecieValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'pic_id'    => 'required',
            'niche_id'  => 'exists:niches,id'
        ],
        ValidatorInterface::RULE_UPDATE => []
    ];
}
