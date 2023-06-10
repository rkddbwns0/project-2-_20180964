<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type = "text/javascript" src = '../js/non_user_Button.js'></script>
        <link rel = "stylesheet" href = "../css/non_user_change_info.css">
    </head>

    <body>
        <?php
            session_start();

            $host = "localhost";
            $user = "kyj";
            $pw = "1234";
            $dbname = "proj";
            $mysqli = new mysqli($host, $user, $pw, $dbname);

            $phone1 = $_SESSION['phone1'];
            $phone2 = $_SESSION['phone2'];

            $sql = "select hospital, name, jumin1, jumin2, phone1, phone2 from nonuser where phone1 = '$phone1' and phone2 = '$phone2'";

            $result = $mysqli->query($sql);

            while($row = $result->fetch_assoc()):
        ?>
        <form>
            <div class = "non_user_form">
                <h1>비회원 예약 변경</h1>

                <input type = "text" id = "hospital" name = "hospital" value = "<?php echo $row['hospital'] ?>" readonly/>
                <br><br>
                <input type = "text" id = "name" name = "name" value = "<?php echo $row['name'] ?> 님" readonly/>
                <br><br>
                <input type = "text"  id = "jumin1" name = "jumin1" maxlength = "6" value = "<?php echo $row['jumin1'] ?>" readonly/> - <input type = "text" id = "jumin2" name = "jumin2" maxlength = "7" value = "<?php echo $row['jumin2'][0].str_repeat('*', strlen($row['jumin2']) - 1) ?>" readonly/>
                <br><br>
                <input type = "text" id = "phone" name = "phone" value = "010" readonly/> - <input type = "text" id = "phone1" name = "phone1" maxlength = "4" value = "<?php echo $row['phone1'] ?>" readonly/> - <input type = "text" id = "phone2" name = "phone2" maxlength = "4" value = "<?php echo $row['phone2'] ?>" readonly/>
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
                <textarea id = "symptom" name = "symptom" placeholder = "증상을 입력하세요." value = "<?php echo $row['symptom'] ?>"></textarea>
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

                <br><br>

                <button type = "button" onclick = "non_user_change()"><b>변경하기</b></button>
                <?php endwhile ?>
            </div>
        </form>
    </body>
</html>