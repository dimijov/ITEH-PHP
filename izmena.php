<?php

require 'db.php';
require 'Pacijent.php';

$db = new DB();
$upit = "select * from pacijent where id=" . $_POST['id'];

$data_set = $db->connection->query($upit);

while ($red = mysqli_fetch_array($data_set)) {
    $pacijent = new Pacijent($red['id'], $red['imep'], $red['prezimep'], $red['dijagnoza'], $red['terapija'], $red['godine'], $red['lekar_id']);
}

echo json_encode($pacijent);