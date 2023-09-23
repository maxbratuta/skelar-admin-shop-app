<?php

namespace App\Exceptions\Admin;

use App\Exceptions\BaseException;

class ProductException extends BaseException
{
    public static function failUpdate($message, array $context = []): self
    {
        self::saveLog($message, $context, ['product']);

        return new self('The product update was failed.', 500);
    }
}
