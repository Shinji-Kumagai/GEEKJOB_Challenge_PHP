<?php
function alien() {
    $id = 0000;
    $name = "Alien";
    $birthday = "3000/01/10";
    $place = "space";
    return array($id, $name, $birthday, $place);
}
function martian() {
    $id = 1111;
    $name = "Martian";
    $birthday = "4000/01/10";
    $place = "Mars";
    return array($id, $name, $birthday, $place);
}
function mercurian() {
    $id = 2222;
    $name = "Mercurian";
    $birthday = "5000/01/10";
    $place = "Mercury";
    return array($id, $name, $birthday, $place);
}
$alien = alien();
$martian = martian();
$mercurian = mercurian();
function program($name) {
    foreach($name as $key => $value) {
        if (($key == 0) || ($key == 3)) {
            continue;
        }
        echo "$key $value<br>";
    }
}
program($alien);
program($martian);
program($mercurian);
