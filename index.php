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
        <div class="home">
            <a href="recipe.php" class="product">
                <img src="images/chicken.webp" alt="chicken" width="700" height="700">
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
            <a href="recipe.php" class="product">
                <img src="images/0101_FPV_Broccoli-Calzones_97286_WEB_SQ_hi_res.webp" alt="calzone" width="700" height="700">
                <div class="name">
                    <h3>Broccoli & Mozzarella Calzones</h3>
                    <p>with Caesar Salad</p>
                </div>
            </a>
        </div>
        <?php
        /*require_once 'config.php';

        $sql = 'SELECT id, name, email, age, FROM users';
        $result = $connection->query($sql);*/
        ?>
    </div>
</body>

</html>