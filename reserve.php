<html>
    <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../css/reserve.css">
        <script type = "text/javascript" src = "../js/reserve_check.js"></script>
    </head>

    <body>
        <?php
            session_start();

            $id = $_SESSION['id'];

            $hospital_name = $_GET['hospital_name'];

            $host = 'localhost';
            $user = 'kyj';
            $pw = '1234';
            $dbname = 'proj';
            $mysqli = new mysqli($host, $user, $pw, $dbname);

            $userSql = "select name from user where id = '$id'";
            $userResult = $mysqli->query($userSql);
            $userRow = $userResult->fetch_assoc();
            $name = $userRow['name'];
        ?>

        <form action = "reserve_check.php" method = "post" enctype = "multipart/form-data" name = "reserve_form">
            <div>
                <h1>예약페이지</h1>

                <input type="hidden" name="id" id = "id" value="<?php echo $_SESSION['id']; ?>">

                <label>
                    <input type = "text" id = "name" name = "name" value = "<?php echo $name ?> 님" readonly><br>
                </label>

                <label>
                    <input type = "text" id = "hospital" name = "hospital" value = "<?php echo $hospital_name ?>" readonly><br>
                </label>

                <select id = "medical" name = "medical">
                    <option disabled selected value = "">진료과</option>
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
                <input type = "date" id = "date" name = "date" value = "날짜 선택" min = <?php echo date('Y-m-d', strtotime('+1 day')); ?> required><br><br>
                <select id = "time" name = "time">
                    <option disabled selected value="">예약 시간</option>
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

                <button type = "button" onclick = "Reserve_Check()">예약하기</button>
            </div>
        </form>
    </body>
</html>