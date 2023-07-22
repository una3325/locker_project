<!DOCTYPE php>
<php lang="kr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>공용사물함</title>
    <link rel="stylesheet" href="./css/index3.css">
    <link rel="stylesheet" href="./css/login2.css">
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
 
    <div class="content">
        <div class="loginmain">
            <!-- 로그인 화면 전체 클래스입니다.-->
           <div class="login-container">
             <form method="post" action="login_action.php">  
               <h2>LOGIN</h2>      
               <div class="id">
                 <label for="id"></label>
                 <input type="text" id="id" name="id" placeholder="아이디" required>
                </div>
         
               <div class="passwd">
                 <label for="pw"></label>  
                 <input type="password" id="pw" name="pw" placeholder="비밀번호" required/>
                </div>
                 
                <div class="remember">
                   <label for="checkbox">
                     <input type="checkbox" id="checkbox" /> <strong>아이디 유지하기</strong>
                   </label>
                </div>
                   
                <div class="search">
                   <a href="searchid.php" class="searchinfo">아이디 찾기</a> 
                   <a href="searchpw.php" class="searchinfo">비밀번호 변경</a>
                   <a href="register.php" class="searchinfo">회원가입</a>
                 </div>
               
                 <div class="login">
                 <input type="submit" value="로그인" />
                </div>
             </form>
           </div>
        </div>
  </div>
</body>

<footer>
        <a>Copyright &copy; 2023, 공사대</a>    
    </footer>
</php>