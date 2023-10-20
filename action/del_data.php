<?php
session_start();
date_default_timezone_set('Asia/Seoul');
$conn = new mysqli("localhost", "server", "00000000", "dataset");

// POST로 전달된 ID를 받음
$id = $_POST['id'];

// ID에 해당하는 데이터 삭제
$sql = "DELETE FROM result1 WHERE id = $id";
$result = mysqli_query($conn, $sql);

// 결과 반환 (실제로는 필요에 따라 처리)
echo json_encode(array('success' => $result));

// 연결 종료
mysqli_close($conn);
