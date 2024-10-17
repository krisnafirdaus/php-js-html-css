<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_siswa";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

echo $servername;

// operator perbandingan
// <, >, <=, >=, ==, !=

$x = 10;
$y = 10;

if ($x == $y) {
    echo "x sama dengan y";
} else {
    echo "x tidak sama dengan y";
}

// opeator perulangan
// for, while, do while, foreach

for ($i = 0; $i < 10; $i++) {
    echo $i;
}

// while
$i = 0;
while ($i < 10) {
    echo $i;
    $i++;
}

// foeach
$array = array(1, 2, 3, 4, 5);
foreach ($array as $value) {
    echo $value;
}

// array
$buah = array("apple", "banana", "cherry");
echo $buah[0];

// assoc array
$buah = array("apple" => "red", "banana" => "yellow", "cherry" => "pink");
echo $buah["apple"];

// multi array
$buah = array(
    array("apple", "red"),
    array("banana", "yellow"),
    array("cherry", "pink")
);
echo $buah[0][0];

// function and procedure
function tambah($a, $b)
{
    return $a + $b;
}
echo tambah(1, 2);

// procedure
function kurang($a, $b)
{
    echo $a - $b;
}
echo kurang(1, 2);



?>


