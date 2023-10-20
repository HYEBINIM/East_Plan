<meta charset="UTF-8">

<?php
session_start();
$conn = new mysqli("localhost", "server", "00000000", "dataset");

// implode 함수를 사용하여 배열을 문자열로 변환
$people = implode(", ", $_POST['people']);
// 금액 칸이 NULL일 경우 예외처리
if ($_POST['money'] == NULL) {
    $money = 0;
} else {
    $money = $_POST['money'];
}


echo $sql = "INSERT INTO result1
(
    `date`,
    `type`,
    `company`,
    `contents`,
    `people`,
    `money`,
    `acc`,
    `add_date`,
    `add_time`
)
VALUES
(
    '" . $_POST['date'] . "',
    '" . $_POST['type'] . "',
    '" . $_POST['company'] . "',
    '" . $_POST['contents'] . "',
    '" . $people . "',
    '" . $money . "',
    '" . $_POST['acc'] . "',
    '" . date('Y-m-d') . "',
    '" . date('H:i:s') . "'
)";
$res = mysqli_query($conn, $sql);

// 성공 또는 실패 여부에 따라 세션 메시지 설정
if ($res) {
    echo "
    <script>
    alert('데이터가 성공적으로 추가되었습니다.');
    location.href='/index.html';
    </script>
    ";
} else {
    echo "
    <script>
    alert('데이터 추가에 실패했습니다.');
    location.href='/index.html';
    </script>
    ";
}

?>