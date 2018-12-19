<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RecordValidator.
 *
 * @package namespace App\Validators;
 */
class RecordValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'user_id'   => 'exists:users,id',
            'niche_id'  => 'exists:niches,id'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
