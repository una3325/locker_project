<!DOCTYPE php>
<php lang="ko">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>공용사물함</title>
    <link rel="stylesheet" href="./css/index3.css">
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

    <div class="text">
    <h2>김포골드라인 사물함 대여 사이트에 오신 것을 환영합니다</h2>
    </div>

    <div class="container">

    <div id="map" style="width:800px;height:600px;"></div>

    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=5344df5f7def8d11c5d001f56cead620
    "></script>
    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div  
        mapOption = { 
            center: new kakao.maps.LatLng(37.620314,126.719808), // 지도의 중심좌표
            level: 8// 지도의 확대 레벨
        };

    var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다
    
    // 마커를 표시할 위치와 title 객체 배열입니다 
    var positions = [
        {
            title: '김포공항역', 
            latlng: new kakao.maps.LatLng(37.562402,126.801289)
        },
        {
            title: '고촌역', 
            latlng: new kakao.maps.LatLng(37.601399,126.770214)
        },
        {
            title: '풍무역', 
            latlng: new kakao.maps.LatLng(37.612294,126.732693)
        },
        {
            title: '사우역', 
            latlng: new kakao.maps.LatLng(37.620314,126.719808)
        },
        {
            title: '걸포북변역', 
            latlng: new kakao.maps.LatLng(37.63165,126.705732)
        },
        {
            title: '운양역', 
            latlng: new kakao.maps.LatLng(37.653851,126.683843)
        },
        
        {
            title: '장기역',
            latlng: new kakao.maps.LatLng(37.6440751,126.6686335)
        },
        {
            title: '구래역', 
            latlng: new kakao.maps.LatLng(37.645397,126.628708)
        }
    ];

    // 마커 이미지의 이미지 주소입니다
    var imageSrc = "http://t1.daumcdn.net/localimg/localimages/07/2018/pc/img/marker_spot.png"; 
        
    for (var i = 0; i < positions.length; i ++) {
        
        // 마커 이미지의 이미지 크기 입니다
        var imageSize = new kakao.maps.Size(24, 35); 
        
        // 마커 이미지를 생성합니다    
        var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize); 
        
        // 마커를 생성합니다
        var marker = new kakao.maps.Marker({
            map: map, // 마커를 표시할 지도
            position: positions[i].latlng, // 마커를 표시할 위치
            title : positions[i].title, // 마커의 타이틀, 마커에 마우스를 올리면 타이틀이 표시됩니다
            image : markerImage // 마커 이미지 
        });
    }
    </script>

    
      
  </div>
   
    


    <div class="text">
    
    <br>
    <h3>이용 안내</h3>
    <br>
    <p>사물함 위치 : <김포골드라인> 김포공항역, 고촌역, 풍무역, 사우역, 걸포북변역, 운양역, 장기역, 구래역</p>
    <br>
    <p>사물함 대여는 회원가입 및 로그인 후 이용 가능합니다.</p>
    <br>
    <p>이용요금은 우측 상단의 이용요금 페이지를 참고해주세요.</p>
    </div>

    <footer>
      <p>&copy; 2023 중부대학교 공사대팀</p>
    </footer>
  </body>
      




