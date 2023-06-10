<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../css/non_user_reserve.css">
        <script type = "text/javascript" src = "../js/non_user_reserve_check.js"></script>
    </head>

    <body>
        <?php 
            $host = "localhost";
            $user = "kyj";
            $pw = "1234";
            $dbname = "proj";
            $mysqli = new mysqli($host, $user, $pw, $dbname);

            $hospital_name = $_GET['hospital_name'];

            $sql = "select * from map where hospital_name = '$hospital_name'";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
        ?>
        <form action = "non_user_check.php" method = "post" enctype = "multipart/form-data" name = "non_user_form">
            <div class = "non_user_form">
                <h1>비회원 예약</h1>

                <label>
                    <input type = "text" id = "hospital" name = "hospital" value = "<?php echo $row['hospital_name']; ?>" readonly />
                </label>

                <br>

                <input type = "text" id = "name" name = "name" placeholder = "이름">

                <br><br>

                <input type = "text"  id = "jumin1" name = "jumin1" maxlength = "6" placeholder = "주민번호"> - <input type = "password" id = "jumin2" name = "jumin2" maxlength = "7">
                
                <br><br>

                <input type = "text" id = "phone" name = "phone" placeholder = "연락처"> - <input type = "text" id = "phone1" name = "phone1" maxlength = "4"> - <input type = "text" id = "phone2" name = "phone2" maxlength = "4">
                
                <br><br>
                
                <select id = "medical" name = "medical">
                    <option disabled selected value="">진료과</option>
                    <option>안과</option>
                    <option>이비인후과</option>
                    <option>신경외과</option>
                    <option>정형외과</option>
                    <option>치과</option>
                    <option>피부과</option>
                    <option>산부인과</option>
                    <option>감염내과</option>
                </select>
                
                <br><br>
                
                <textarea id = "symptom" name = "symptom" placeholder = "증상을 입력하세요."></textarea>
                
                <br><br>
                
                <input type = "date" id = "date" name = "date" value = '진료 날짜' min = <?php echo date('Y-m-d', strtotime('+1 day')); ?> required>
                
                <br><br>
                
                <select id = "time" name = "time">
                    <option disabled selected value="">진료 시간</option>
                    <option>09:00</option>
                    <option>09:30</option>
                    <option>10:00</option>
                    <option>10:30</option>
                    <option>11:00</option>
                    <option>11:30</option>
                    <option>12:00</option>
                    <option>12:30</option>
                    <option>14:00</option>
                    <option>14:30</option>
                    <option>15:00</option>
                    <option>15:30</option>
                    <option>16:00</option>
                    <option>16:30</option>
                    <option>17:00</option>
                    <option>17:30</option>
                    <option>18:00</option>
                    <option>18:30</option>
                    <option>19:00</option>
                    <option>19:30</option>
                </select>
                
                <br><br><br>

                <button type = "button" onclick = "non_user_Reserve_Check()"><b>예약하기</b></button>
            </div>
        </form>
    </body>
</html>