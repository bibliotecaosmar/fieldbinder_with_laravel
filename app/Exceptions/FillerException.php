<?php

namespace App\Exceptions;

use Exception;

class FillerException extends Exception
{
    public $exception;

    public function leach($exception)
    {
        switch(get_class($exception))
        {
            case QueryException::class      : return ['success' => false, 'messages' => $exception->getMessage()];
            case ValidatorException::class  : return ['success' => false, 'messages' => $exception->getMessageBag()];
            case Exception::class           : return ['success' => false, 'messages' => $exception->getMessage()];
            default                         : return ['success' => false, 'messages' => get_class($exception)];
        }
    }
}
