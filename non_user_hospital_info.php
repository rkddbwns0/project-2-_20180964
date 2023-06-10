<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../css/hospital_info.css">
    </head>

    <body>
        <?php
            $host = "localhost";
            $user = "kyj";
            $pw = "1234";
            $dbname = "proj";
            $mysqli = new mysqli($host, $user, $pw, $dbname); 

            // 
            $hospital_name = $_GET['$hospital_name'];
            // hospital_name을 디코딩
            $hospital_name = urldecode($hospital_name);

            $sql = "select * from map";

            $result = $mysqli->query($sql);
        ?>
        <div class = "map_div">
            <div id = "map">
                <h1>병원 찾기</h1>
            </div>
            <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=16589273775f26d16dbf61e5098241e7&libraries=services,clusterer"></script>
            <script>
                var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
                    mapOption = { 
                        center: new kakao.maps.LatLng(37.5042687, 126.7886531), // 지도의 중심좌표
                        level: 7 // 지도의 확대 레벨
                    };

                var map = new kakao.maps.Map(mapContainer, mapOption);
                
                var clusterer = new kakao.maps.MarkerClusterer({
                    map: map
                });

                var markers = [];

                // for 문을 통해 db 테이블에 있는 값들을 순차적으로 가져옴
                <?php 
                    for($i = 0; $i < 7; $i++) {
                        $row = $result->fetch_assoc();
                        $hospital_name = $row['hospital_name'];
                        $x = $row['x'];
                        $y = $row['y'];
                ?>

                    // 마커를 생성합니다
                    var marker = new kakao.maps.Marker({
                        position: new kakao.maps.LatLng(<?php echo $x; ?>, <?php echo $y; ?>),
                        size: new kakao.maps.Size(45, 45),
                        map: map,
                        title : '<?php echo $hospital_name; ?>'
                    });

                    function Reserve(hospitalName) {
                        var msg = hospitalName + "으로 예약하시겠습니까?";
                        var result = confirm(msg)
                        
                        if(result) {
                            // encodeURIComponent() 함수를 통해 hspitalName 변수를 주소 뒤에 전달
                            location.href = "non_user_reserve.php?hospital_name=" + encodeURIComponent(hospitalName);
                        }
                    }
                        
                
                    var iwContent = "<div class = 'hospital_info' style = 'width:250px; height:100px;'><p><?php echo $hospital_name; ?></p><br><button type = 'submit' id = 'reserve_btn' onclick = \"Reserve('<?php echo $hospital_name; ?>')\">예약하기</button> <button type = 'button' id = 'where_map_btn' onclick = \"location.href= 'https://map.kakao.com/link/to/<?php echo $hospital_name ?>, <?php echo $x ?>, <?php echo $y ?>'\">길찾기</button></div>", // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
                        iwPosition = new kakao.maps.LatLng(<?php echo $x; ?>, <?php echo $y; ?>), //인포윈도우 표시 위치입니다
                        iwRemoveable = true;

                    // 인포윈도우를 생성합니다
                    var infowindow = new kakao.maps.InfoWindow({
                        position : iwPosition, 
                        content : iwContent,
                        removable : iwRemoveable
                    });

                    kakao.maps.event.addListener(marker, 'click', (function (marker, infowindow) {
                        return function () {
                            // 현재 마커에 대한 인포윈도우를 표시합니다
                            infowindow.open(map, marker);
                        };
                    })(marker, infowindow));

                    markers.push({ markers: marker, infowindow: infowindow });

                    clusterer.addMarker(marker);
                <?php
                    }
                ?>
            </script>
        </div>
    </body>
</html>