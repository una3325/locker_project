<!DOCTYPE html>
<html lang="kr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>공용사물함</title>
    <link rel="stylesheet" href="./css/index3.css">
    <link rel="stylesheet" href="./css/region.css">

    
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  </head>
   
  </head>

  <body>

    <form action="region_server.php" method="post">
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

    <!-- 로그인 하지 않고 사물함 대여시 로그인 알림 -->
      <?php
          session_start();

          // 로그인 확인
          if (!isset($_SESSION['userid'])) {
              // 로그인하지 않은 경우, 알림창 띄우기
              echo "<script>alert('로그인이 필요합니다.');</script>";
              // 로그인 페이지로 리다이렉트
              echo "<script>window.location.href='login.php';</script>";
              exit; // 뒤에 코드가 실행되지 않도록 종료
          }
      ?>
      
    <div class="text">
    <h2>사물함을 선택해주세요.</h2>
    </div>


   <!-- <p>------지도 시작------</p> -->
   <div class="container">
    <div id="map" style="width:800px;height:600px;"></div>

      <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=5344df5f7def8d11c5d001f56cead620
      "></script>
      <script>
      var mapContainer = document.getElementById('map'), // 지도를 표시할 div  
          mapOption = { 
              center: new kakao.maps.LatLng(37.620314,126.719808), // 지도의 중심좌표
              level:1// 지도의 확대 레벨
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

          markers.push(marker); // 생성된 마커를 배열에 추가
      }

      // select 요소의 변경 이벤트 핸들러
      var selectBox = document.getElementById('selectBox');
      selectBox.addEventListener('change', function() {
          var selectedIndex = selectBox.selectedIndex;
          
          // "선택해주세요" 옵션을 선택한 경우, 지도를 초기 위치로 이동
          if (selectedIndex === 0) {
              map.setCenter(new kakao.maps.LatLng(37.562402,126.801289));
              return;
          }
          
          // 선택한 옵션의 인덱스에 해당하는 마커로 지도를 이동
          var selectedMarker = markers[selectedIndex - 1];
          map.setCenter(selectedMarker.getPosition());
      });
      </script>
      <!-- <p>------지도 끝------</p> -->

          <!-- 가운데 직선 -->
     <div class="vertical-line"></div>

          <!-- 사물함 이미지  -->
     <div class="lockernoimg">
          <img src="/imgs/lockerno.png"  width="800" height="600">
          </div>

    </div>




    <div class="SelectOption">
      <div class="form-group">
        <label for="LS_region">지역</label>
        <div class="select-wrapper">
          <select name="LS_region" id="selectBox">
            <option value="">선택해주세요</option>
            <option value="김포공항역">김포공항역</option>
            <option value="고촌역">고촌역</option>
            <option value="풍무역">풍무역</option>
            <option value="사우역">사우역</option>
            <option value="걸포북변역">걸포북변역</option>
            <option value="운양역">운양역</option>
            <option value="장기역">장기역</option>
            <option value="구래역">구래역</option>
        </select>
      </div>
    </div>

    <script>
  // 이벤트 핸들러 함수
  function handleSelectChange() {
    var selectedValue = this.value;

    // 선택된 위치에 맞는 위도와 경도 정보
    var positions = [
      { title: '김포공항역', lat: 37.562402, lng: 126.801289 },
      { title: '고촌역', lat: 37.601399, lng: 126.770214 },
      { title: '풍무역', lat: 37.612294, lng: 126.732693 },
      { title: '사우역', lat: 37.620314, lng: 126.719808 },
      { title: '걸포북변역', lat: 37.63165, lng: 126.705732 },
      { title: '운양역', lat: 37.653851, lng: 126.683843 },
      { title: '장기역', lat: 37.6440751, lng: 126.6686335 },
      { title: '구래역', lat: 37.645397, lng: 126.628708 }
    ];

    // 선택된 위치로 지도 이동
    var selectedPosition = positions.find(function(position) {
      return position.title === selectedValue;
    });

    if (selectedPosition) {
      var map = new kakao.maps.Map(document.getElementById('map'), {
        center: new kakao.maps.LatLng(selectedPosition.lat, selectedPosition.lng),
        level: 1
      });
    }
  }

  // select 요소에 change 이벤트 리스너 추가
  var selectBox = document.getElementById('selectBox');
  selectBox.addEventListener('change', handleSelectChange);
</script>
<br>


<div class="form-group">
  <label for="LS_num">사물함 번호</label>
  <div class="select-wrapper">
  <select name="LS_num">
<?php
for ($i = 1; $i <= 25; $i++) {
  echo "<option value=\"$i\">$i</option>";
}
?>
</select>
</div>
</div>
<br>


<div class="form-group">
<label for="LS_date">날짜</label>
<input type="text" placeholder="날짜" id="LS_date" name="LS_date">
</div>

<script>
$(document).ready(function() {
  $("#LS_date").datepicker({
    dateFormat: "yy-mm-dd", // 선택한 날짜의 형식 (연도-월-일)
    minDate: 0 // 오늘 이후의 날짜만 선택 가능하도록 설정
  });
});
</script>

 

<div class="join">
  <button type="submit" name="save">저장</button>
</div>
</div>

</div>
  <footer>
      <a>Copyright &copy; 2023, 공사대</a>    
  </footer>
</body>
</php>