<?php
require_once '../../Data-Base/db.php';

$sql = "ALTER TABLE article ADD COLUMN layout_id INT UNSIGNED DEFAULT NULL";

try {
    $pdo->exec($sql);
    echo "Colonne layout_id ajoutée à la table article !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
