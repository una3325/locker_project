<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>여러개 마커 표시하기</title>
    
</head>
<body>
<div id="map" style="width:100%;height:350px;"></div>

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
var imageSrc = "https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/markerStar.png"; 
    
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
</body>
</html>