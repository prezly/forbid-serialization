<?php

declare(strict_types=1);

namespace Prezly\ForbidSerialization\Exceptions;

use LogicException;
use Throwable;

class SerializationForbiddenException extends LogicException
{
    /**
     * @param string $className
     * @param Throwable|null $previous
     */
    public function __construct(string $className, Throwable $previous = null)
    {
        parent::__construct("Serializing `{$className}` instances is forbidden.", 0, $previous);
    }
}
