<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="index.css">
    <title>폐건전지맵</title>
</head>
<body>
<body>
    <header>
        <div class="logo">
            <span>폐건전지 맵</span>
        </div>
    </header>
<div id="map" style="width:100%;height:100vh;">

    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=b664a5773695eefacaa985bf4cfae966&libraries=services,clusterer,drawing"></script>
    <script>
    var mapContainer = document.getElementById('map'), // 지도를 표시할 div
        mapOption = {
            center: new kakao.maps.LatLng(37.5192314, 127.020512), // 지도의 중심좌표
            level: 8 // 지도의 확대 레벨
        };


    var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    var clusterer = new kakao.maps.MarkerClusterer({
       map: map, // 마커들을 클러스터로 관리하고 표시할 지도 객체
       averageCenter: true, // 클러스터에 포함된 마커들의 평균 위치를 클러스터 마커 위치로 설정
       minLevel: 4 // 클러스터 할 최소 지도 레벨
    });

    <?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/db.php');

    mysqli_set_charset($con, 'utf8');
    $res = mysqli_query($con, 'select Latitude, Longitude from recycle limit 500');
    $result = array();


    while ($row = mysqli_fetch_array($res)) {
        array_push($result, array($row[0],$row[1]));
        ?>

var markers = [];
        var marker = new kakao.maps.Marker({
                position: new kakao.maps.LatLng(<?=$row[0]?>,<?=$row[1]?>), // 마커의 좌표
                map: map // 마커를 표시할 지도 객체
            });

            markers.push(marker);
clusterer.addMarkers(markers);
        <?
    }

    ?>


    </script>
</div>

<input type="checkbox" id="menuicon">
    <label for ="menuicon">
        <span></span>
        <span></span>
        <span></span>
    </label>
    <div class="sidebar">
        <h1 id="sidetitle">폐건전지 맵</h1>
        <p id="sidesub">폐건전지,폐형광등 수거함 지도</p>
        <p style="color: white;margin-left: 30px;margin-top: 300px;" >___________________________________</p>
        <p style="color: white;margin-left: 30px;font-size: 18px;font-weight: bold;">폐건전지 분리수거 필요성</p>
        <p id="sidesub">건전지는 망간, 아연 등의 오염물질이 함유되어 있어 일반쓰레기와 함께 매립되면 알칼리 침출수, 수산화니켈 등에 의해 토양이 오염 될 수 있고, 소각 시 망간, 아연 등을 함유한 배기가스에 의해 대기가 오염될 수 있습니다.</p>
        <p style="color: white;margin-left: 30px;margin-top: 80px;font-size: 14px;">개발자 : 3조</p>
    </div>
</body>
</html>
