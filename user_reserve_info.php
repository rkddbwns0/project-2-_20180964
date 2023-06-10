<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type = "text/javascript" src = "../js/Button.js"></script>
        <link rel = "stylesheet" href = "../css/reserve_info.css">
        <?php
            session_start();

            $id = $_SESSION['id'];

            $host = "localhost";
            $user = "kyj";      
            $pw = "1234";
            $dbname = "proj";
            $mysqli = new mysqli($host, $user, $pw, $dbname);

            $sql = "select name, hospital ,medical ,symptom, date, time from reserve where id = '$id'";

            $result = $mysqli->query($sql);

            if ($result -> num_rows == 0) {
                echo "<script>alert('예약 정보가 존재하지 않습니다. 예약을 진행해 주세요.');</script>";
                echo "<script>location.replace('user_main.php');</script>";
            }
        ?>
    </head>

    <body>
        <div class = "header"><h2><a onclick = "location.href = 'user_main.php'">병원 통합 예약 시스템</a></h2></div>
        <form>
            <table class = "user_info">
                <h1>예약 정보</h1>

                <?php while ($row = $result->fetch_assoc()): ?>

                    <tr>
                        <th class = "hosp_name">병원명</th>
                        <td><p><?php echo $row['hospital']; ?></p></td>
                    </tr>

                    <tr class = "name_tr">
                        <th class = "usr_name">이름</th>
                        <td><p><?php echo $row['name']; ?></p></td>
                    </tr>

                    <tr class = "date_tr">
                        <th class = "usr_date">진료 날짜</th>
                        <td><p><?php echo $row['date']; ?>  <?php echo $row['time']; ?></p></td>
                    </tr>

                    <tr class = "medical_tr">
                        <th class = "usr_medical">진료과</th>
                        <td><p><?php echo $row['medical']; ?></p></td>
                    </tr>

                    <tr class = "symptom_tr">
                        <th class = "usr_symptom">증상</th>
                        <td><p><?php echo $row['symptom']; ?></p></td>
                    </tr>

                <?php endwhile; ?>
            </table>

            <br>
            <div class = "btn_div">
                <button type = "button" onclick = "Reserve_Change()" class = "change_btn"><b>예약 변경</b></button>
                <button type = "button" onclick = "Delete()" class = "rm_btn"><b>예약 취소</b></button>
            </div>
        </form>
        
    </body>
</html>

