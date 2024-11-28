<?php
require_once 'db.php';

header('Content-Type: text/html; charset=utf-8');

// Récupérer et nettoyer la recherche
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Limite maximale de résultats
$limit = 5;

if ($search === '') {
    // Afficher les suggestions initiales
    $stmt = $db->prepare("SELECT id, nom FROM animaux ORDER BY nom LIMIT :limit");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($animals as $animal) {
        echo "<div class='suggestion' data-id='{$animal['id']}'>" . 
             htmlspecialchars($animal['nom']) . 
             "</div>";
    }
} else {
    // Requête pour les correspondances
    $stmt = $db->prepare("
        SELECT id, nom
        FROM animaux 
        WHERE LOWER(nom) LIKE LOWER(:search)
        ORDER BY 
            CASE 
                WHEN LOWER(nom) LIKE LOWER(:exactSearch) THEN 0
                ELSE 1
            END,
            nom
        LIMIT :limit
    ");
    
    $stmt->bindValue(':search', "%$search%");
    $stmt->bindValue(':exactSearch', "$search%");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        foreach ($results as $animal) {
            $highlightedName = preg_replace(
                '/(' . preg_quote($search, '/') . ')/i',
                '<strong>$1</strong>',
                htmlspecialchars($animal['nom'])
            );
            echo "<div class='suggestion' data-id='{$animal['id']}'>{$highlightedName}</div>";
        }
    } else {
        echo "<div class='no-results'>Aucun résultat trouvé</div>";
    }
}