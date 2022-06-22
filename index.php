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

if (isset($_POST["products"])) {
    $arrayKeysProducts = array_keys($_POST["products"]);
    for ($i = 0; $i < count($arrayKeysProducts); $i++) {
        $totalValue += $products[$arrayKeysProducts[$i]]["price"];
    }
}

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
        echo "<div class='alert alert-danger' role='alert'>
    Ye forgot t' fill in all yer information, please try again.
</div>";
    } else if (!is_numeric(($_POST["zipcode"]))) {
        echo "<div class='alert alert-danger' role='alert'>
    Ye Zipcode shall only consist o' numbers, please try again.
</div>";
    }
    else if (!strpos($_POST["email"], "@")) {
        echo "<div class='alert alert-danger' role='alert'>
    Ye e-mail that ye 'ave given be invalid, please try again.
</div>";
    }
    else{
        echo '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Arrgh, confirm ye order matey!</h4>';
        //creates p tag with needed information in
        echo "<p>Email: <b>";
        echo $_POST["email"];
        echo "</b></p>";

        echo "<p>Street: <b>";
        echo $_POST["street"];
        echo "</b></p>";

        echo "<p>Street Number: <b>";
        echo $_POST["streetnumber"];
        echo "</b></p>";

        echo "<p>City: <b>";
        echo $_POST["city"];
        echo "</b></p>";

        echo "<p>Zipcode: <b>";
        echo $_POST["zipcode"];
        echo "</b></p>";

        if (isset($_POST["products"])) {
            $arrayKeysProducts = array_keys($_POST["products"]);
            for ($i = 0; $i < count($arrayKeysProducts); $i++) {
                echo "<p>";
                echo $originalProducts[$arrayKeysProducts[$i]]["name"];
                echo ": <b>";
                echo $originalProducts[$arrayKeysProducts[$i]]["price"];
                echo "€";
                echo "</b></p>";
                $totalValue += $originalProducts[$arrayKeysProducts[$i]]["price"];
            }
        }

        echo "<p>For a total amount of: <b>";
        echo $totalValue;
        echo "€</b></p>";


        echo '
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
';

        echo "</div>";
    }
    //adding information to the session, it first needs to go through a lot of different filters
    //I don't want to add any information that may be wrong to the session.

    if (isset($_POST["email"]) && isset($_POST["zipcode"]) && isset($_POST["city"])
        && isset($_POST["street"]) && isset($_POST["streetnumber"]) && isset($_POST["products"])
        && strpos($_POST["email"], "@") && is_numeric($_POST["zipcode"])) {
        $_SESSION["email"] = [];
        $_SESSION["city"] = [];
        $_SESSION["street"] = [];
        $_SESSION["streetnumber"] = [];
        $_SESSION["zipcode"] = [];

        array_push($_SESSION["email"], [$_POST["email"]]);
        $_SESSION["city"] = [$_POST["city"]];
        $_SESSION["street"] = [$_POST["street"]];
        $_SESSION["streetnumber"] = [$_POST["streetnumber"]];
        $_SESSION["zipcode"] = [$_POST["zipcode"]];
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