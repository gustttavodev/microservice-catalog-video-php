<?php

namespace Tests\Unit\Domain\Validation;

use Core\Domain\Exception\EntityValidationException;
use Core\Domain\Validation\DomainValidation;
use PHPUnit\Framework\TestCase;
use Throwable;

class DomainValidationUnitTest extends TestCase
{
    public function testNotNull()
    {
        try {

            $value = '';
            DomainValidation::notNull($value);

            $this->assertTrue(false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testNotNullCustomMessageException()
    {
        try {

            $value = '';
            DomainValidation::notNull($value, 'Custom Message exception');

            $this->assertTrue(false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, 'Custom Message exception');
        }
    }

    public function testStrMaxLenght()
    {
        try {

            $value = 'abc';
            DomainValidation::strMaxLenght($value,2, 'Custom Message');

            $this->assertTrue(false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, 'Custom Message exception');
        }
    }

    public function testStrMinLenght()
    {
        try {

            $value = '1';
            DomainValidation::strMinLenght($value,8, 'Custom Message');

            $this->assertTrue(false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, 'Custom Message exception');
        }
    }

    public function testStrCanNullMaxLenght()
    {
        try {

            $value = 'teste';
            DomainValidation::strCanNullMaxLenght($value,3, 'Custom Message');

            $this->assertTrue(false);

        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th, 'Custom Message exception');
        }
    }
}