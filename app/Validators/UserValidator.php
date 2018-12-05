<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nickname' => 'unique:user,nickname',
            'birth'    => 'required',
            'name'     => 'unique:user,name',
            'email'    => 'required|unique:user,email',
            'password' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [],
    ];
}
