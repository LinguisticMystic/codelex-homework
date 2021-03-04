<?php

//turbosalad missing: eggs, spinach
//coolsalad missing:

require_once 'Ingredient.php';
require_once 'IngredientCollection.php';
require_once 'Recipe.php';
require_once 'RecipeCollection.php';

do {
    $numberOfIngredients = readline('Enter the number of ingredients: ');
} while (!filter_var($numberOfIngredients, FILTER_VALIDATE_INT));

$myIngredients = new IngredientCollection();

for ($i = 1; $i <= $numberOfIngredients; $i++) {
    $myIngredients->addIngredient(new Ingredient(readline("Enter ingredient $i: ")));
}

$myWonderfulRecipeBook = new RecipeCollection();

$myWonderfulRecipeBook->addRecipes([
    new Recipe('Cool Salad', 'mayonnaise', 'salt', 'pepper'),
    new Recipe('Lazy Lunch', 'mayonnaise', 'bread'),
    new Recipe('Dog Wrap', 'sausage', 'cheese'),
    new Recipe('Dorm Dream', 'water', 'noodles', 'mayonnaise', 'ketchup'),
    new Recipe('Anorexic\'s Choice', 'water', 'lemon')
]);

$recipesThatCanBeMade = ($myIngredients->canBeUsedToMake($myWonderfulRecipeBook));
$availableIngredientNames = array_map(fn($item) => $item->getName(), $myIngredients->getIngredients());

echo 'With these ingredients:' . PHP_EOL;

foreach ($myIngredients->getIngredients() as $index => $ingredient) {
    echo "[$index] {$ingredient->getName()}" . PHP_EOL;
}

echo 'You can make the following recipes:' . PHP_EOL;

foreach ($recipesThatCanBeMade as $index => $recipe) {

    echo "[$index] {$recipe->getName()}. [ Missing ingredients: ";

    foreach($recipe->getRecipeIngredients() as $requiredIngredient) {
        if (!in_array($requiredIngredient, $availableIngredientNames)) {
            echo $requiredIngredient . ' ';
        }
    }
    echo ']' . PHP_EOL;
}
