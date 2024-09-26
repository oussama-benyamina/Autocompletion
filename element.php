<?php
require_once 'db.php';

$id = $_GET['id'] ?? '';

$stmt = $db->prepare("SELECT * FROM animaux WHERE id = :id");
$stmt->execute(['id' => $id]);
$animal = $stmt->fetch();

if (!$animal) {
    die("Animal non trouvé");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($animal['nom']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($animal['nom']); ?></h1>
    <img src="<?php echo htmlspecialchars($animal['photo']); ?>" alt="<?php echo htmlspecialchars($animal['nom']); ?>" style="max-width: 300px;">
    <p><?php echo nl2br(htmlspecialchars($animal['description'])); ?></p>
    <a href="index.php">Retour à la recherche</a>
</body>
</html>