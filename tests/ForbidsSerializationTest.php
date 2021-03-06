<?php

use PHPUnit\Framework\TestCase;
use Prezly\ForbidSerialization\Exceptions\SerializationForbiddenException;
use Prezly\ForbidSerialization\ForbidsSerialization;

final class ForbidsSerializationTest extends TestCase
{
    use ForbidsSerialization;

    /**
     * @test
     */
    public function it_should_throw_when_an_instance_using_the_trait_is_being_serialized()
    {
        $this->expectException(SerializationForbiddenException::class);
        $this->expectExceptionMessage('Serializing `ForbidsSerializationTest` instances is forbidden.');

        serialize($this);
    }

    /**
     * @test
     */
    public function it_should_throw_when_an_instance_using_the_trait_is_being_unserialized()
    {
        $this->expectException(SerializationForbiddenException::class);
        $this->expectExceptionMessage('Serializing `ForbidsSerializationTest` instances is forbidden.');

        unserialize('O:24:"ForbidsSerializationTest":0:{}');
    }
}
