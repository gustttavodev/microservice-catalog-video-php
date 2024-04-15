<?php

namespace Tests\Unit\Domain\Entity;

use Core\Domain\Entity\Category;
use Core\Domain\Exception\EntityValidationException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Throwable;

class CategoryUnitTest extends TestCase
{
    public function testAttributes()
    {
        $category = new Category(
            name: 'New Cat',
            description: 'New Desc',
            isActive: true
        );

        $this->assertNotEmpty($category->id());
        $this->assertNotEmpty($category->createdAt());
        $this->assertEquals('New Cat', $category->name);
        $this->assertEquals('New Desc', $category->description);
        $this->assertEquals(true, $category->isActive);
    }

    public function testActived()
    {
        $category = new Category(
            name: 'New Cat',
            isActive: false
        );

        $this->assertFalse($category->isActive);

        $category->activate();

        $this->assertTrue($category->isActive);
    }

    public function testDisabled()
    {
        $category = new Category(
            name: 'New Cat',
            isActive: true
        );

        $this->assertTrue($category->isActive);

        $category->disable();

        $this->assertFalse($category->isActive);
    }

    public function testUpdated()
    {
        $uuid = Uuid::uuid4()->toString();
   
        $category = new Category(
            id: $uuid,
            name: 'name_before',
            description: 'description_before',
            createdAt: '2023-01-01 12:12:12'
        );

        $category->update('name_after', 'description_after');

        $this->assertEquals($uuid, $category->id());
        $this->assertEquals('name_after', $category->name);
        $this->assertEquals('description_after', $category->description);
    }

    public function testExceptionName()
    {
        try {
            new Category(
                name: 't',
                description: 'nasdasd',
            );

            $this->assertTrue(false);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }

    public function testExceptionDescription()
    {
        try {
            new Category(
                name: 'teste',
                description: random_bytes(99999),
            );

            $this->assertTrue(false);
        } catch (Throwable $th) {
            $this->assertInstanceOf(EntityValidationException::class, $th);
        }
    }
}
