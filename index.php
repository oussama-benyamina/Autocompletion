<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche d'Animaux</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Recherche d'Animaux</h1>
    <div class="search-container">

        <form action="recherche.php" method="GET">
            <input type="text" id="search" name="search" placeholder="Rechercher un animal...">
            <button type="submit">Rechercher</button>
        </form>
    </div>    
    <div id="suggestions"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
