<?php
require_once 'config.php';

$recipe_id = $_GET['id'];       // gets id from url

$sql = "SELECT * FROM recipedata WHERE recipe_id = $recipe_id";      // selects all data from recipedata
$result = $connection->query($sql);     // forms connection from config.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="layout">
        <nav>
            <a href="index.php"> HOME </a>
            <a href="help.php"> HELP </a>
        </nav>
        <?php
        if ($result->num_rows > 0):
        ?>
            <?php $row = $result->fetch_assoc(); // for looping through rows
            ?>
            <div class="hero">
                <div class="intro">
                    <h3><?php echo $row['recipe_heading'] ?></h3>
                    <p><?php echo $row['recipe_subheading'] ?></p>
                    <p class="desc"><?php echo $row['description'] ?></p>
                </div>
                <img src="images/<?php echo $row['image'] ?>" alt="<?php echo $row['recipe_heading'] ?>" width="700" height="700">
            </div>
            <div class="ingredients">
                <h4>Ingredients</h4>
                <ul>
                    <?php
                    $ingredients = explode("*", $row['ingredients']);
                    ?>
                    <?php foreach ($ingredients as $list): // for looping through items inside a database field
                    ?>
                        <li><?php echo $list; ?></li>
                    <?php endforeach; ?>

                    <!-- layout template below -->

                    <!-- <li>4 Boneless, Skinless Chicken Breasts</li>
                    <li>1 Tbsp Ancho Chile Paste</li>
                    <li>2 Tbsps Crème Fraîche</li>
                    <li>3 Tbsps Golden Raisins</li> -->
                </ul>
            </div>
            <hr>
            <?php
            $steps = explode("*", $row['steps']);
            $step_images = explode("*", $row['steps_images']);
            $step_number = 1; // starts step as 1
            ?>
            <?php foreach ($steps as $instruction): ?>
                <div class="step">
                    <div>
                        <h4>Step <?php echo $step_number ?></h4>
                        <p><?php echo $instruction ?></p>
                    </div>
                    <img src="<?php echo $step_images[$step_number - 1] ?>" alt="<?php echo $row['recipe_heading'] ?>">
                </div>
                <hr>
            <?php
                $step_number++;
            endforeach; ?>

            <!-- layout template below -->

            <!-- <div>
                <h4>Step 1</h4>
                <p>Place an oven rack in the center of the oven, then preheat to 450°F. In a
                    medium pot, combine the rice, a big pinch of salt, and 1 1/2 cups of
                    water. Heat to boiling on high. Once boiling, cover and reduce the heat to
                    low. Cook 12 to 14 minutes, or until the water has been absorbed and the rice
                    is tender. Turn off the heat and fluff with a fork. Cover to keep warm.</p>
            </div>
            <hr>
            <div>
                <h4>Step 2</h4>
                <p>Prepare the ingredients & make the glaze:
                    While the rice cooks, wash and dry the fresh produce. Peel the carrots;
                    quarter lengthwise, then halve crosswise. Peel and roughly chop the garlic.
                    Remove and discard the stems of the kale; finely chop the leaves. Using a
                    peeler, remove the lime rind, avoiding the white pith; mince to get 2
                    teaspoons of zest (or use a zester). Halve the lime crosswise. Halve the
                    orange; squeeze the juice into a bowl, straining out any seeds. Whisk in the
                    chile paste and 2 tablespoons of water until smooth.</p>
            </div>
            <hr>
            <div>
                <h4>Step 3</h4>
                <p>Place the sliced carrots on a sheet pan. Drizzle with olive oil and season
                    with salt and pepper; toss to coat. Arrange in an even layer. Roast 15 to 17
                    minutes, or until tender when pierced with a fork. Remove from the oven.</p>
            </div>
            <hr>
            <div>
                <h4>Step 4</h4>
                <p>While the carrots roast, in a large pan (nonstick, if you have one), heat 2
                    teaspoons of olive oil on medium-high until hot. Add the chopped garlic
                    and cook, stirring constantly, 30 seconds to 1 minute, or until fragrant. Add
                    the chopped kale; season with salt and pepper. Cook, stirring occasionally,
                    3 to 4 minutes, or until slightly wilted. Add 1/3 cup of water; season with
                    salt and pepper. Cook, stirring occasionally, 3 to 4 minutes, or until the kale
                    has wilted and the water has cooked off. Transfer to the pot of cooked rice.
                    Stir to combine; season with salt and pepper to taste. Cover to keep warm.
                    Wipe out the pan.</p>
            </div>
            <hr>
            <div>
                <h4>Step 5</h4>
                <p>While the carrots continue to roast, pat the chicken dry with paper towels;
                    season with salt and pepper on both sides. In the same pan, heat 2 teaspoons
                    of olive oil on medium-high until hot. Add the seasoned chicken and cook 4 to
                    6 minutes on the first side, or until browned. Flip and cook 2 to 3 minutes, or
                    until lightly browned. Add the glaze and cook, frequently spooning the glaze
                    over the chicken, 2 to 3 minutes, or until the chicken is coated and cooked
                    through. Turn off the heat; stir the butter and the juice of 1 lime half into
                    the glaze until the butter has melted. Season with salt and pepper to taste.</p>
            </div>
            <hr>
            <div>
                <h4>Step 6</h4>
                <p>Finish the rice & serve your dish:
                    To the pot of cooked rice and kale, add the lime zest, crème fraîche,
                    raisins, and the juice of the remaining lime half. Stir to combine;
                    season with salt and pepper to taste. Serve the glazed chicken with the
                    finished rice and roasted carrots. Top the chicken with the remaining glaze
                    from the pan. Enjoy!</p>
            </div> -->
        <?php endif;
        $connection->close();
        ?>
    </div>
</body>

</html>