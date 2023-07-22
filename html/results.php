<!DOCTYPE php>
<php lang="kr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>공용사물함</title>
    <link rel="stylesheet" href="./css/index3.css">
    <link rel="stylesheet" href="./css/results.css">
    
  </head>

  <body>
    <?php session_start();?>
    <div class="navbar">
      <img src="./imgs/1.png" alt="Logo" width="30" height="30">
      <a class="nav-link1" href="index.php"> 공용 사물함 대여 시스템 </a>
      <a class="nav-link2" href="price.php"> 이용요금 안내 </a>
      <a class="nav-link3" href="region.php"> 사물함 대여 </a>
      <div class="nav-link5">
      <?php if (isset($_SESSION['userid'])) {
        ?><b><?php echo $_SESSION['userid'];?></b>님 반갑습니다. 
      <a class="nav-link5" href="logout_action.php">  로그아웃</a>
        <?php } else {?>
      <a class="nav-link5" href="login.php"> 로그인 </a>

      <?php
        }
        ?>
      </div>
    </div>
    
    <h4 class="subtitle">최종 정보 확인</h4> 

    <div class="black-box">

    <?php 
    $usertable = "LockerSelection";
    $yourfield = "region, num, date";
    require('../dbconnect.php');
    $conn = mysqli_connect(MYSQL_IP, DB_USER, DB_PASSWORD, USE_DB);
    if (!$conn) {
        die("html><script language='JavaScript'>alert('Unable to connect to the database! Please try again later.'),history.go(-1)</script></html>");//에러메세지 출력 후 현재 페이지로 돌아가라는 javascript 코드
    }

    $query = "SELECT $yourfield FROM $usertable ORDER BY no DESC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($row = mysqli_fetch_assoc($result)) {
            $region = $row['region'];
            $num = $row['num'];
            $date = $row['date'];
            echo "지역: " . $region . "<br/>";
            echo "사물함 번호: " . $num . "<br/>";
            echo "날짜: " . $date . "<br/>";
        } else {
            echo "저장된 정보가 없습니다.";
        }
    }?>
    
</div>




    <footer>
        <a>Copyright &copy; 2023, 공사대</a>    
    </footer>

</body>
</php>