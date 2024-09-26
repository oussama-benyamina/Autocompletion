<?php
require_once 'db.php';

$search = $_GET['search'] ?? '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de recherche</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Résultats pour "<?php echo htmlspecialchars($search); ?>"</h1>

    <?php
    $stmt = $db->prepare("SELECT * FROM animaux WHERE nom LIKE :search");
    $stmt->execute(['search' => "%$search%"]);
    
    while ($animal = $stmt->fetch()) {
        echo "<p><a href='element.php?id={$animal['id']}'>";
        echo "<img src='{$animal['photo']}' alt='{$animal['nom']}' style='max-width: 50px;'> ";
        echo "{$animal['nom']}</a></p>";
    }
    ?>

    <a href="index.php">Retour à la recherche</a>
</body>
</html>