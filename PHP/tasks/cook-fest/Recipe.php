<?php

class Recipe
{
    private string $name;
    private array $requiredIngredients = [];

    public function __construct(string $name, string ...$ingredients)
    {
        $this->name = $name;
        $this->requiredIngredients = $ingredients;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRecipeIngredients(): array
    {
        return $this->requiredIngredients;
    }

}