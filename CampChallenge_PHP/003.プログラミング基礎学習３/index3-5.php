<?php
function someone_profile() {
    $id = 0000;
    $name = "someone";
    $birthday = 3000/01/10;
    $place = "space";
    return array($id, $name, $birthday, $place);
}

$results = someone_profile();
foreach($results as $value) {
    echo "$value<br>";
}
