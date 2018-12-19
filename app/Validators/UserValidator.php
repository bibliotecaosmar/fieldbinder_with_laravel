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
            'nickname' => 'unique:users,nickname'|'required_without:users,name',
            'birth'    => 'required',
            'name'     => 'unique:users,name'|'required_without:users,nickname',
            'email'    => 'required|unique:users,email',
            'password' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nickname' => 'required_without:users,name',
            'name'     => 'required_without:users,nickname'
        ],
    ];
}
