<meta charset="UTF-8">

<?php
// index.html 수정 오버레이에서 받아온 데이터를 수정해줌
// edit_data.php

// DB 연결
$conn = new mysqli("localhost", "server", "00000000", "dataset");

// 에러 체크
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// id 파라미터 확인
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // 수정할 데이터 업데이트 쿼리
    $date = $_POST['date'];
    $type = $_POST['type'];
    $company = $_POST['company'];
    $contents = $_POST['contents'];
    $people = implode(', ', $_POST['people']); // 배열을 문자열로 변환
    $money = $_POST['money'];
    $acc = $_POST['acc'];

    $sql = "UPDATE result1 SET date='$date', type='$type', company='$company', contents='$contents', people='$people', money='$money', acc='$acc' WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result) {
        $response = array("status" => "success", "id" => $id);
        echo json_encode(array('response' => $response));
        echo "
        <script>
        alert('데이터가 성공적으로 수정되었습니다.');
        location.href='/index.html';
        </script>
        ";
    } else {
        $response = array("status" => "error", "error" => $conn->error);
        echo json_encode(array('response' => $response));
        echo "
        <script>
        alert('데이터 수정에 실패했습니다.');
        location.href='/index.html';
        </script>
        ";
    }
} else {
    echo json_encode(array("status" => "error"));
}

// 연결 닫기
$conn->close();
?>