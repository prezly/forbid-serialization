<?php

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
    public function __sleep()
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
    public function __serialize()
    {
        throw new SerializationForbiddenException(get_class($this));
    }
}
