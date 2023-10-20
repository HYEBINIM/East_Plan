<?php
// edit_dataGet.php

// DB 연결
$conn = new mysqli("localhost", "server", "00000000", "dataset");

// 에러 체크
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// id 파라미터 확인
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 데이터 가져오기 쿼리
    $sql = "SELECT * FROM result1 WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 데이터가 있으면 연관 배열을 JSON으로 변환하여 반환
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        // 데이터가 없으면 빈 JSON 반환
        echo json_encode(array());
    }
} else {
    // id 파라미터가 없으면 빈 JSON 반환
    echo json_encode(array());
}

// 연결 닫기
$conn->close();
