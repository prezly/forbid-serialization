<?php

declare(strict_types=1);

namespace Prezly\ForbidSerialization;

use Prezly\ForbidSerialization\Exceptions\SerializationForbiddenException;

/**
 * Trait ForbidsSerialization, when attached to a class,
 * will throw an exception every time an instance of the class
 * will be attempted for PHP serialization (using `serialize()` function).
 *
 * @see https://www.php.net/manual/en/function.serialize.php
 */
trait ForbidsSerialization
{
    /**
     * serialize() checks if the class has a function with the magic name __sleep().
     * If so, that function is executed prior to any serialization. It can clean up
     * the object and is supposed to return an array with the names of all variables
     * of that object that should be serialized. If the method doesn't return anything
     * then NULL is serialized and E_NOTICE is issued.
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.sleep
     *
     * @throws SerializationForbiddenException always.
     */
    final public function __sleep()
    {
        throw new SerializationForbiddenException(get_class($this));
    }

    /**
     * unserialize() checks for the presence of a function with the magic name __wakeup().
     * If present, this function can reconstruct any resources that the object may have.
     *
     * The intended use of __wakeup() is to reestablish any database connections that may
     * have been lost during serialization and perform other reinitialization tasks.
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.wakeup
     *
     * @throws SerializationForbiddenException always.
     */
    final public function __wakeup()
    {
        throw new SerializationForbiddenException(get_class($this));
    }

    /**
     * serialize() checks if the class has a function with the magic name __serialize().
     * If so, that function is executed prior to any serialization. It must construct
     * and return an associative array of key/value pairs that represent the serialized
     * form of the object. If no array is returned a TypeError will be thrown.
     *
     * Works since PHP 7.4.0.
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.serialize
     *
     * @throws SerializationForbiddenException always.
     */
    final public function __serialize(): array
    {
        throw new SerializationForbiddenException(get_class($this));
    }

    /**
     * unserialize() checks for the presence of a function with the magic name __unserialize().
     * If present, this function will be passed the restored array that was returned from __serialize().
     * It may then restore the properties of the object from that array as appropriate.
     *
     * Works since PHP 7.4.0.
     *
     * @see https://www.php.net/manual/en/language.oop5.magic.php#object.unserialize
     *
     * @throws SerializationForbiddenException always.
     */
    final public function __unserialize(array $data): void
    {
        throw new SerializationForbiddenException(get_class($this));
    }
}
