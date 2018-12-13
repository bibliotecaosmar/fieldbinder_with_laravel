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
            'nickname' => 'unique:user,nickname'|'required_without:user,name',
            'birth'    => 'required',
            'name'     => 'unique:user,name'|'required_without:user,nickname',
            'email'    => 'required|unique:user,email',
            'password' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nickname' => 'required_without:user,name',
            'name'     => 'required_without:user,nickname'
        ],
    ];
}
