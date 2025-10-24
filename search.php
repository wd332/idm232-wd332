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
        <div class="search">
            <form method="GET" action="">
                <div class="search-bar">
                    <img src="images/search-icon.svg" alt="search-icon">
                    <input type="text" name="search" placeholder="What do you wish to devour today?">
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
                        <input type="radio" name="filter" value="Chinese/East Asian">
                        <span>Chinese/East Asian</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="French/European">
                        <span>French/European</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Fusion/Modern">
                        <span>Fusion/Modern</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Indian/Southeast Asian">
                        <span>Indian/Southeast Asian</span>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Italian">
                        <span>Italian</span>
                    </label>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Mediterranean/Middle Eastern">
                        <span>Mediterranean/Middle Eastern</span>
                    </label>
                    </label>
                    <label>
                        <input type="radio" name="filter" value="Mexican/Latin American">
                        <span>Mexican/Latin American</span>
                    </label>
                </div>
                <div>
                    <button type="submit">Search Recipes</button>
                </div>
            </form>
            <div class="no-results">
                <h3>NO RESULTS FOUND</h3>
                <p>
                    My apologies, but what you are looking for currently doesn't exist in my dictionary.<br>
                    May I interest you in something else?
                </p>
            </div>
        </div>
    </div>
</body>

</html>