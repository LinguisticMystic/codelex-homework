<?php

class RecipeCollection
{
    private array $recipes = [];

    public function getRecipes(): array
    {
        return $this->recipes;
    }

    public function addRecipe(Recipe $recipe): void
    {
        $this->recipes[] = $recipe;
    }

    public function addRecipes(array $recipes): void
    {
        foreach ($recipes as $recipe) {
            $this->addRecipe($recipe);
        }
    }

}