<?php
require_once '../../Data-Base/db.php';

$sql = "INSERT INTO layouts (name, preview_img, html_code) VALUES
('Layout 1', '../images/layout1.jpg', '<div>HTML du layout 1</div>'),
('Layout 2', '../images/layout2.jpg', '<section>HTML du layout 2</section>')";

$pdo->exec($sql);
echo "Layouts ajoutés !";
?>
