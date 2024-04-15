<?php

namespace Tests\Unit\UseCase\Category;

use Core\Domain\Entity\Category;
use Core\UseCase\Category\CreateCategoryUseCase;
use Mockery;
use PHPUnit\Framework\TestCase;
use stdClass;

class CreateCategoryUseCaseTestUnit extends TestCase
{
    public function testCreateNewCategory()
    {
        $categoryId = 'id';
        $categoryName = 'name';
        $this->mockEntity = Mockery::mock(Category::class, [
            $categoryId,
            $categoryName
        ]);

        $this->repositoryMock = Mockery::mock(stdClass::class, Category::class);
        $this->repositoryMock->shouldReceive('insert')->andReturn();


        $useCase = new CreateCategoryUseCase($this->repositoryMock);
        $useCase->execute();
    }
}