<?php
require_once 'config.php';

$sql = "SELECT * FROM recipedata";      // selects all data from recipedata
$result = $connection->query($sql);     // forms connection from config.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="layout">
        <nav>
            <a href="index.php"> HOME </a>
            <a href="help.php"> HELP </a>
        </nav>
        <h1>HELL'S PARADISE</h1>
        <h2>so hellishly delicious that even those in hell will keel over</h2>
        <a href="search.php" class="more-info">KNOW WHAT YOU WANT?</a>
        <?php
        if ($result->num_rows > 0): // prevents empty content and this says "if the database has more than 0 rows, execute the following"
        ?>
            <div class="home">
                <?php while ($row = $result->fetch_assoc()): ?> <!-- fetches the resulting rows and creates a loop that repeats the HTML layout for every recipe row in the data -->
                    <a href="recipe.php?id=<?php echo $row['recipe_id'] ?>" class="product"> <!-- passes the recipe ID in the URL to the corresponding product card -->
                        <img src="images/<?php echo $row['image'] ?>" alt="<?php echo $row['recipe_heading'] ?>" width="700" height="700"> <!-- replaced the placeholder image with php so that it can retrieve whatever image needed -->
                        <div class="name">
                            <h3><?php echo $row['recipe_heading'] ?></h3>
                            <p><?php echo $row['recipe_subheading'] ?></p>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php endif;
        $connection->close();
        ?>

        <!-- layout template below -->

        <!-- <div class="home">
            <a href="recipe.php" class="product">
                <img src="images/orangechicken.webp" alt="orangechicken" width="700" height="700">
                <div class="name">
                    <h3>Ancho-Orange Chicken</h3>
                    <p>with Kale Rice & Roasted Carrots</p>
                </div>
            </a>
            <a href="recipe.php" class="product">
                <img src="images/steak.webp" alt="steak" width="700" height="700">
                <div class="name">
                    <h3>Beef Medallions & Mushroom Sauce</h3>
                    <p>with Mashed Potatoes</p>
                </div>
            </a>
            <a href="recipe.php" class="product">
                <img src="images/sandwhich.webp" alt="sandwhich" width="700" height="700">
                <div class="name">
                    <h3>Broccoli & Basil Pesto Sandwiches</h3>
                    <p> with Romaine & Citrus Salad</p>
                </div>
            </a>
        </div> -->
    </div>
</body>

</html>