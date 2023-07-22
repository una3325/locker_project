<?php
session_start();

require("../dbconnect.php");
$conn = mysqli_connect(MYSQL_IP, DB_USER, DB_PASSWORD, USE_DB);

// 입력 받은 정보
$name = $_POST['name'];
$Nickname = $_POST['Nickname'];
$email = $_POST['email'];


// 이름 있는지 검사
$query = "SELECT * FROM member WHERE name='$name'";
$result = $conn->query($query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($email == $row['mail'] && $Nickname == $row['Nickname']) {
        // 입력된 정보가 일치하는 경우 해당 id 가져오기
        $id = $row['id'];
        
        // 아이디 출력 또는 필요한 작업 수행
        ?>
        <div class="echoid">
            <style>
                .echoid {
                    background-color: #ededed;
                    align-items: center;
                    padding: 10px;
                    border-radius: 5px;
                    color: #333333;
                    font-size: 18px;
                    font-weight: bold;
                    text-align: center;
                }
            </style>
            <?php
            echo "아이디: " . $id;
            ?>
        </div>
    
        <?php
    } else {
        ?> 
        <script>
            alert("입력하신 사용자 정보를 찾을 수 없습니다.");
            history.back();
        </script>
        <?php
        exit;
    }
} else {
    ?> 
    <script>
        alert("입력하신 사용자 정보를 찾을 수 없습니다.");
        history.back();
    </script>
    <?php
    exit;
}
?>

<style>
    .searchinfo {
        display: inline-block;
        padding: 10px 20px;
        color: #333333;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 10px;
    }
    .searchinfo:hover {
        color: red;
    }
</style>

<a href="index.php" class="searchinfo">홈</a>
<a href="login.php" class="searchinfo">로그인</a>
<a href="searchid.php" class="searchinfo">돌아가기</a>