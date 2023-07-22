<!DOCTYPE php>
<php lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>공용사물함</title>
    <link rel="stylesheet" href="./css/index3.css">
    <link rel="stylesheet" href="./css/register.css">
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
    
<form action="register_server.php" method="post">
<h2>회원가입</h2>

<?php if(isset($_GET['error'])){ ?>
<div class="notification error">
    <p class="error"><?php echo $_GET['error']; ?></p>
</div>
<?php } ?>
<?php if(isset($_GET['success'])) {?>
<div class="notification success">
    <p class="success"><?php echo $_GET['success']; ?></p>
</div>
<?php } ?>

<br>
<label>이름</label>
<input type="text" placeholder ="이름" name="user_name">
    
<label>아이디</label>
<input type="text" placeholder ="아이디" name="user_id">
    
<label>비밀번호</label>
<input type="password" placeholder ="비밀번호" name="user_pass1">
    
<label>비밀번호 확인</label>
<input type="password" placeholder ="비밀번호 확인" name="user_pass2">

<label>e-mail</label>
<input type="email" placeholder ="e-mail" name="user_mail">

<label>전화번호 (ex. 010-1234-5678)</label>
<input type="text" placeholder ="전화번호" name="user_phone">

<label>어린시절 별명이 무엇이었나요</label>
<input type="text" placeholder ="별명 : 비밀번호 변경에 필요" name="user_Nickname">


<h3>개인정보 수집 및 동의</h3>
    <div class="box">
         <div class="scrollable-content">
                            1. 수집하는 개인정보
        <br><br>
        (1) 공사대는 최초 회원 가입시 원활한 서비스 제공을 위해 아래와 같은 최소한의 개인정보를 필수항목으로 수집하고 있습니다.
        <br><br>
        필수항목 : 이름, 아이디, 비밀번호, 이메일 주소, 전화번호
        <br><br>
        (2) 서비스 이용 과정이나 사업처리 과정에서 아래와 같은 정보들이 추가로 수집될 수 있습니다.
        <br><br>
        거래정보 : 신용카드정보(신용카드번호, 유효기간, 비밀번호 앞 두 자리)
        <br><br>
        서비스 이용 정보 : 서명 요청자 및 참여자 정보 (이름, 이메일 주소, 전화번호), 전화번호, IP 주소, 쿠키, 방문 일시, 서비스 이용 기록, 불량 이용 기록, 브라우저 정보, 운영체제 정보(OS), 사용 기기 정보, MAC 주소, 방문 일시 등
        <br><br>
        2. 개인정보의 수집 및 이용목적
        <br><br>
        (1) 회원관리
        <br><br>
        회원제 서비스 제공 및 개선, 개인식별, 이용약관 위반 회원에 대한 이용제한 조치, 서비스의 원활한 운영에 지장을 미치는 행위 및 서비스 부정이용 행위 제재, 가입의사 확인, 가입 및 가입횟수 제한, 분쟁 조정을 위한 기록보존, 고지사항 전달, 회원탈퇴 의사의 확인 등
        <br><br>
        (2) 서비스 제공에 관한 계약 이행 및 유료서비스 제공에 따른 요금정산
        <br><br>
        전자서명 서비스 제공, 콘텐츠 제공, 특정 맞춤 서비스 제공, 구매 및 요금 결제, 본인인증, 청구서 발송, 요금 추심 등
        
        <br><br>
        3. 개인정보의 보유 및 이용기간
        <br><br>
        이용자의 개인정보는 원칙적으로 개인정보의 수집 및 이용목적이 달성되면 지체 없이 파기합니다. 단, 상법, 전자상거래 등에서의 소비자보호에 관한 법률 등 관계법령의 규정에 의하여 보존할 필요가 있는 경우 공사대는 관계법령에서 정한 일정한 기간 동안 회원 정보를 보관합니다. 이 경우 공사대는 보관하는 정보를 그 보관의 목적으로만 이용하며 보존기간은 아래와 같습니다.
        
        <br><br>
        
        (1) 계약 또는 청약철회 등에 관한 기록
        <br><br>
        보존 이유 : 전자상거래 등에서의 소비자보호에 관한 법률
        <br>
        보존 기간 : 5년
        <br><br>
        (2) 대금결제 및 재화 등의 공급에 관한 기록
        <br><br>
        보존 이유 : 전자상거래 등에서의 소비자보호에 관한 법률
        <br>
        보존 기간 : 5년
        <br><br>
        (3) 소비자의 불만 또는 분쟁처리에 관한 기록
        <br><br>
        보존 이유 : 전자상거래 등에서의 소비자보호에 관한 법률
        <br>
        보존 기간 : 3년
        <br><br>
        (4) 웹사이트 방문기록
        <br><br>
        보존 이유 : 통신비밀보호법
        <br>
        보존 기간 : 3개월
         </div>
    </div>


    <label for="checkbox">
     <input type="checkbox" id="checkbox" required/> 
    <strong>동의</strong> 
    </label>                    
              
    <div class="join">
    <button type="submit" name="save">저장</button>      
    </div>   
                    
    <div class="loginpage">
      <a href="login.php">이미 회원이신가요? (로그인 페이지)</div>
      </div>
</form>
    
</body>
</php>

<footer>
  <p>&copy; 2023 중부대학교 공사대팀</p>
</footer>