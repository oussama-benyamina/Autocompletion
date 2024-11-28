<?php
require_once 'db.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

$stmt = $db->prepare("SELECT * FROM animaux WHERE nom LIKE :search");
$stmt->execute(['search' => "%$search%"]);
$animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de recherche pour "<?= htmlspecialchars($search) ?>"</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Résultats pour "<?= htmlspecialchars($search) ?>"</h1>
        <a href="index.php" class="back-link">Retour à la recherche</a>
    </header>
    
    <main class="search-results">
        <?php if (empty($animals)): ?>
            <p class="no-results">Aucun résultat trouvé pour "<?= htmlspecialchars($search) ?>".</p>
        <?php else: ?>
            <div class="animal-grid">
                <?php foreach ($animals as $animal): ?>
                    <div class="animal-card">
                        <img src="<?= htmlspecialchars($animal['photo']) ?>" alt="<?= htmlspecialchars($animal['nom']) ?>">
                        <h2><?= htmlspecialchars($animal['nom']) ?></h2>
                        <p><?= htmlspecialchars(substr($animal['description'], 0, 100)) ?>...</p>
                        <a href="element.php?id=<?= $animal['id'] ?>" class="details-link">Voir les détails</a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>