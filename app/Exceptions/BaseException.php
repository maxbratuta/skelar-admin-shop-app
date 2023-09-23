<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Throwable;

abstract class BaseException extends Exception
{
    public function __construct($message = '', $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function saveLog($message, array $context = [], array $channels = ['daily']): void
    {
        try {
            Log::stack($channels)->error($message, $context);
        } catch (Exception $e) {
            return;
        }
    }
}

