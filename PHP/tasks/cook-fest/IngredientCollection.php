<?php

class IngredientCollection
{
    private array $ingredients = [];

    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredients[] = $ingredient;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function getIngredientNames(): array
    {
        return array_map(fn($item) => $item->getName(), $this->ingredients);
    }

    public function canBeUsedToMake(RecipeCollection $recipeBook): array
    {
        $canBeMade = [];

        foreach ($this->ingredients as $ingredient) {
            foreach ($recipeBook->getRecipes() as $recipe) {

                if (in_array($ingredient->getName(), $recipe->getRecipeIngredients())) {
                    if (!in_array($recipe, $canBeMade)) {
                        $canBeMade[] = $recipe;
                    }
                }
            }
        }
        return $canBeMade;
    }

}