<?php
// This file is your starting point (= since it's the index)
// It will contain most of the logic, to prevent making a messy mix in the html

// This line makes PHP behave in a more strict way
declare(strict_types=1);

// We are going to use session variables so we need to enable sessions
session_start();

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

$products = [
    ['name' => 'Krabby Patty', 'price' => 1.25],
    ['name' => 'Double Krabby Patty', 'price' => 2],
    ['name' => 'Triple Krabby Patty', 'price' => 3],
    ['name' => 'Coral Bits', 'price' => 1.50],
    ['name' => 'Kelp Rings', 'price' => 1.50],
    ['name' => 'Krabby Meal', 'price' => 3.50],
    ['name' => 'Double Krabby Meal', 'price' => 3.75],
    ['name' => 'Triple Krabby Meal', 'price' => 4],
    ['name' => 'Salty Sea Dog', 'price' => 1.25],
    ['name' => 'Sailors Surprise', 'price' => 3],
    ['name' => 'Footlong', 'price' => 2],
    ['name' => 'Golden Loaf', 'price' => 2.50],
];

$totalValue = 0;
$productsLength = count($products);


    function validate()
{
    // TODO: This function will send a list of invalid fields back
    return [];
}

function handleForm(array $originalProducts)
{

    // Validation (step 2)
    if (empty($_POST["email"]) || empty($_POST["streetnumber"]) || empty($_POST["street"])
        || empty($_POST["city"])|| empty($_POST["zipcode"])|| empty($_POST["products"])){
        // TODO: handle errors
        echo '<div class="alert alert-danger" role="alert">
  You forgot to fill in all your information, please try again.
</div>';
    } else if (!is_numeric(($_POST["zipcode"]))) {
        echo '<div class="alert alert-danger" role="alert">
  The Zipcode should only consist of numbers, please try again.
</div>';
    }

    else {
        // TODO: handle successful submission
        echo $_POST["email"];
        echo $_POST["street"];
        echo $_POST["streetnumber"];
        echo $_POST["city"];
        echo $_POST["zipcode"];
        if (isset($_POST["products"])) {
            $arrayKeysProducts = array_keys($_POST["products"]);
            for ($i = 0; $i < count($arrayKeysProducts); $i++) {
                echo $originalProducts[$arrayKeysProducts[$i]]["name"];
                echo "<br>";
            }
        }
    }
}


if (!empty($_POST)) {
    handleForm($products);
}

// TODO: replace this if by an actual check
$formSubmitted = false;
if ($formSubmitted) {
    handleForm();
}


require 'form-view.php';