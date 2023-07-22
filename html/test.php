<!DOCTYPE php>
<php>
  <head>
    <meta charset="utf-8" />
    <title>카테고리 메뉴와 지도</title>
    <style>
      #menu {
        float: left;
        width: 200px;
        height: 100%;
        background-color: #f1f1f1;
      }

      #mapContainer {
        float: left;
        width: calc(100% - 200px);
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="menu">
      <ul>
        <li><a href="#" onclick="showMap(1)">카테고리 1</a></li>
        <li><a href="#" onclick="showMap(2)">카테고리 2</a></li>
        <li><a href="#" onclick="showMap(3)">카테고리 3</a></li>
        <li><a href="#" onclick="showMap(4)">카테고리 4</a></li>
        <li><a href="#" onclick="showMap(5)">카테고리 5</a></li>
      </ul>
    </div>
    <div id="mapContainer"></div>
    <script
      type="text/javascript"
      src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=5344df5f7def8d11c5d001f56cead620"
    ></script>
    <script>
      function showMap(category) {
        var mapContainer = document.getElementById('mapContainer');
        mapContainer.innerphp = '';

        var mapOption = {
          center: new kakao.maps.LatLng(33.450701, 126.570667), // 지도의 중심좌표
          level: 3, // 지도의 확대 레벨
        };

        var map = new kakao.maps.Map(mapContainer, mapOption);

        // 카테고리에 따라 지도에 마커를 표시하는 로직 추가
        // 해당 카테고리에 맞는 좌표 정보를 가져와서 마커를 생성하고 지도에 추가하는 방식으로 구현합니다.
        // 아래는 예시입니다.
        if (category === 1) {
          var markerPosition = new kakao.maps.LatLng(33.450701, 126.570667);
          var marker = new kakao.maps.Marker({
            position: markerPosition,
          });
          marker.setMap(map);
        } else if (category === 2) {
          var markerPosition = new kakao.maps.LatLng(33.450702, 126.570668);
          var marker = new kakao.maps.Marker({
            position: markerPosition,
          });
          marker.setMap(map);
        } else if (category === 3) {
          var markerPosition = new kakao.maps.LatLng(33.450703, 126.570669);
          var marker = new kakao.maps.Marker({
            position: markerPosition,
          });
          marker.setMap(map);
        } else if (category === 4) {
          var markerPosition = new kakao.maps.LatLng(33.450704, 126.57067);
          var marker = new kakao.maps.Marker({
            position: markerPosition,
          });
          marker.setMap(map);
        } else if (category === 5) {
          var markerPosition = new kakao.maps.LatLng(33.450705, 126.570671);
          var marker = new kakao.maps.Marker({
            position: markerPosition,
          });
          marker.setMap(map);
        }
      }
    </script>
  </body>
</php>
