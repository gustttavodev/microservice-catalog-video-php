<?php

namespace Core\UseCase\Category;

use Core\Domain\Repository\CategoryRepositoryInterface;
use Core\UseCase\DTO\Category\{
    CategoryListInputDto,
    CategoryListOutputDto
};

class ListCategoryUseCase
{
    public function __construct(
        protected CategoryRepositoryInterface $repository
    ) {
    }

    public function execute(CategoryListInputDto $input): CategoryListOutputDto
    {
        $category = $this->repository->findById($input->id);

        return new CategoryListOutputDto(
            id: $category->id,
            name: $category->name,
            description: $category->description,
            is_active: $category->isActive
        );
    }
}