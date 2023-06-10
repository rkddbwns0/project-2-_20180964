<html>
    <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type = "text/javascript" src = "../js/Change.js"></script>
        <link rel = "stylesheet" href = "../css/reserve.css">
    </head>

    <body>
        <?php
            session_start();

            $id = $_SESSION['id'];
            
            // db 접속 정보
            $host = 'localhost';
            $user = 'kyj';
            $pw = '1234';
            $dbname = 'proj';
            $mysqli = new mysqli($host, $user, $pw, $dbname);

            $sql = "select name, id from user where id = '$id'";
            $result = $mysqli -> query($sql);

            $hosSql = "select hospital from reserve where id = '$id'";
            $hosResult = $mysqli -> query($hosSql);
            $hosRow = $hosResult->fetch_assoc();
            $hospital = $hosRow['hospital'];

            while($row = $result->fetch_assoc()):
        ?> 

        <form class = "reserve_form">
            <h1>예약 변경</h1>

            <input type="hidden" name="id" id = "id" value="<?php echo $_SESSION['id']; ?>">

            <label>
                <input type = "text" id = "name" name = "name" value = "<?php echo $row['name']; ?> 님" readonly/><br>
            </label>

            <label>
                <input type = "text" id = "hospital" name = "hospital" value = "<?php echo $hospital ?>" readonly/><br>
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
                </select> <br><br>
                <textarea id = "symptom" name = "symptom" placeholder = "증상을 입력하세요."></textarea><br><br>
            <input type = "date" id = "date" name = "date" data-placeholder = '날짜 선택' min = <?php echo date('Y-m-d', strtotime('+1 day')); ?> required><br><br>
            <select id = "time" name = "time">
                <option>시간 선택</option>
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

            <button type = "button" onclick = "Change()">변경하기</button>
            <?php endwhile ?>
        </form>
    </body>
</html>