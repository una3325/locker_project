
<?php
session_start();

require("../dbconnect.php");
$conn = mysqli_connect(MYSQL_IP, DB_USER, DB_PASSWORD, USE_DB);

// 입력 받은 정보
$name = $_POST['name'];
$id = $_POST['id'];
$Nickname = $_POST['Nickname'];
$pw1 = $_POST['pw1'];
$pw2 = $_POST['pw2'];

// 데이터베이스에서 사용자 정보 검증
$query = "SELECT * FROM member WHERE name='$name' AND id='$id' AND Nickname='$Nickname'";
$result = $conn->query($query);

if (mysqli_num_rows($result) > 0) {
    // 비밀번호 일치 여부 확인
    if ($pw1 === $pw2) {
        // 비밀번호 업데이트
        $hashedPw = password_hash($pw1, PASSWORD_DEFAULT); // 비밀번호 해시화
        $updateQuery = "UPDATE member SET pw='$hashedPw' WHERE id='$id'";
        $conn->query($updateQuery);
        
        ?>
        <script>
            alert('비밀번호 변경이 완료되었습니다.'); // 알림창
            location.replace("./index.php");
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("비밀번호가 일치하지 않습니다.");
            history.back();
        </script>
        <?php
    }
} else {
    ?>
    <script>
        alert("입력하신 사용자 정보를 찾을 수 없습니다.");
        history.back();
    </script>
    <?php
}
?>