<!DOCTYPE php>
<php lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>공용사물함</title>
    <link rel="stylesheet" href="./css/index3.css">
    <link rel="stylesheet" href="./css/searchid.css">
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
        <div class="searchidbox">
           <div class="search-container">
             <form method="post" action="searchid_server.php">  
               <h2>아이디 찾기</h2>      
               <div class="name">
                 <label for="name"></label>
                 <input type="text" id="name" name="name" placeholder="이름을 입력해주세요" required>
                </div>
         
                <div class="name"> <!--클래스 름 Nick 으로 바꾸니까 css계속 깨짐 -->
                 <label for="Nickname"></label>
                 <input type="text" id="Nickname" name="Nickname" placeholder="어린시절 별명을 입력해주세요" required>
                </div>

                <div class="email">
                 <label for="email"></label>  
                 <input type="email" id="email" name="email" placeholder="이메일 주소를 입력해주세요" required/>
                </div>
                   
                <div class="search">
                   <a href="login.php" class="searchinfo">로그인</a> 
                   <a href="searchpw.php" class="searchinfo">비밀번호 변경</a>
                   <a href="register.php" class="searchinfo">회원가입</a>
                 </div>
               
                 <div class="searchid">
                 <input type="submit" value="아이디 찾기" />
                </div>
             </form>
           </div>
        </div>
  </div>
    <footer>
        <a>Copyright &copy; 2023, 공사대</a>    
    </footer>
  </body>
      




