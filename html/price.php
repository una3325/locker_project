<!DOCTYPE php>
<php lang="kr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>공용사물함</title>
    <link rel="stylesheet" href="./css/index3.css">
    <link rel="stylesheet" href="./css/price.css">
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
    
    <table>
      <tr>
        <th>이용시간</th>
        <th>이용요금</th>
      </tr>
      <tr>
        <td>기본 4시간</td>
        <td>3000원</td>
      </tr>
      <tr>
        <td>4시간 이후 부터</td>
        <td>시간당 800원 추가</td>
      </tr>
      <tr>
        <td>24시간(하루)</td>
        <td>12000원</td>
      </tr>
    </table>

        

    <footer>
      <a>Copyright &copy; 2023, 공사대</a>    
    </footer>

  </body>
</php>