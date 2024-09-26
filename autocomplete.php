<?php
require_once 'db.php';

$search = $_GET['search'] ?? '';

$stmtExact = $db->prepare("SELECT * FROM animaux WHERE nom LIKE :search ORDER BY nom LIMIT 5");
$stmtExact->execute(['search' => "$search%"]);
$exactMatches = $stmtExact->fetchAll();

$stmtContains = $db->prepare("SELECT * FROM animaux WHERE nom LIKE :search AND nom NOT LIKE :exactSearch ORDER BY nom LIMIT 5");
$stmtContains->execute(['search' => "%$search%", 'exactSearch' => "$search%"]);
$containsMatches = $stmtContains->fetchAll();

foreach ($exactMatches as $animal) {
    echo "<div class='suggestion'>" . htmlspecialchars($animal['nom']) . "</div>";
}
if (!empty($exactMatches) && !empty($containsMatches)) {
    echo "<hr>";
}
foreach ($containsMatches as $animal) {
    echo "<div class='suggestion'>" . htmlspecialchars($animal['nom']) . "</div>";
}