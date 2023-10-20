<?php
session_start();
$conn = new mysqli("localhost", "server", "00000000", "dataset");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = array();

$sql = "select * from result1 order by id desc";
$res = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($res)) {
    array_push($data, $row['date']);
    array_push($data, $row['type']);
    array_push($data, $row['company']);
    array_push($data, $row['contents']);
    array_push($data, $row['people']);
    array_push($data, $row['money']);
    array_push($data, $row['acc']);
    array_push($data, $row['add_date']);
    array_push($data, $row['add_time']);
}

echo json_encode($data);
