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

$people = array($alien, $martian, $mercurian);

// var_dump($people);
// for($i=0;$i<3;$i++) {
//     for($j=0;$j<4;$j++) {
//         $output = $people[$i][$j];
//         echo $output."<br>";
//     }
// }

function program($name) {
    foreach($name as $key => $value) {
        if (($key == 0) || ($key == 3)) {
            continue;
        }
        elseif ($key == 1) {
            echo "Name :" . $value."<br>";
        }
        elseif ($key == 2) {
            echo "Birthday :" . $value."<br><br>";
        }
        // echo "$key $value<br>";
    }
}
for($i=0;$i<2;$i++) {
    program($people[$i]);
}
