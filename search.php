<?php
require_once 'config.php';

$search = urldecode($_GET['query']);

$sql = "SELECT * FROM `recipedata`
        WHERE `recipe_heading` LIKE '%$search%'
        OR `recipe_subheading` LIKE '%$search%'
        OR `description` LIKE '%$search%'
        OR `ingredients` LIKE '%$search%'
        OR `steps` LIKE '%$search%'
        OR `image` LIKE '%$search%'
        OR `cuisine` LIKE '%$search%'
        OR `recipe_id` LIKE '%$search%'";      // selects all data from recipedata where the columns find the words input into $search

if (isset($_GET['filter'])) {        // isset() function checks if a variable is set and is not NULL. if it's not, it'll execute the filter. htmlspecialchars() is used for security
    $filter = urldecode($_GET['filter']);
    $sql = "SELECT * FROM `recipedata` WHERE `cuisine` LIKE '$filter'";
}

if ($filter == "All") {
    $sql = "SELECT * FROM recipedata";
}

$result = $connection->query($sql);     // forms connection from config.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="layout">
        <nav>
            <a href="index.php"> HOME </a>
            <a href="help.php"> HELP </a>
        </nav>
        <div class="search">
            <form method="GET" action="search.php">
                <div class="search-bar">
                    <img src="images/search-icon.svg" alt="search-icon">
                    <input type="text" name="query" placeholder="What do you wish to devour today?">
                </div>
                <div class="filter">
                    <p>Have a cuisine you're craving for?</p>
                    <label>
                        <input type="radio" name="filter" value="All">
                        <span>All</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="American">
                        <span>American</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Chinese / East Asian">
                        <span>Chinese/East Asian</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="French / European">
                        <span>French/European</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Fusion / Modern">
                        <span>Fusion/Modern</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Indian / Southeast Asian">
                        <span>Indian/Southeast Asian</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Italian">
                        <span>Italian</span>
                    </label>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Mediterranean / Middle Eastern">
                        <span>Mediterranean/Middle Eastern</span>
                    </label>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Mexican / Latin American">
                        <span>Mexican/Latin American</span>
                    </label>
                </div>
                <div>
                    <button type="submit">Search Recipes</button>
                </div>
            </form>
        </div>
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
        <?php
        if ($result->num_rows == 0): // this says "if the database has 0 rows, execute the following"
        ?>
            <div class="no-results">
                <h3>NO RESULTS FOUND</h3>
                <p>
                    My apologies, but what you are looking for currently doesn't exist in my dictionary.<br>
                    May I interest you in something else?
                </p>
            </div>
        <?php endif;
        $connection->close();
        ?>
    </div>
</body>

</html>