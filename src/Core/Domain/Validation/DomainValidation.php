<?php

namespace Core\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, string $exceptMessage = null)
    {
        if (empty($value))
            throw new EntityValidationException($exceptMessage ?? 'Should not be empty');
    }
    public static function strMaxLenght(string $value, int $lenght = 255, string $exceptMessage = null)
    {
        if (strlen($value) >= $lenght)
            throw new EntityValidationException($exceptMessage ?? 'The value must not be greater than '.$lenght.' characters');
    }

    public static function strMinLenght(string $value, int $lenght = 2, string $exceptMessage = null)
    {
        if (strlen($value) < $lenght)
            throw new EntityValidationException($exceptMessage ?? 'The value must not be greater than '.$lenght.' characters');
    }

    public static function strCanNullMaxLenght(string $value = '', int $lenght = 255, string $exceptMessage = null)
    {
        if (!empty($value) && strlen($value) > $lenght)
            throw new EntityValidationException($exceptMessage ?? 'The value must not be greater than '.$lenght.' characters');
    }
}
