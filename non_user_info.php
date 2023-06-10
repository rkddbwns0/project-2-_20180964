<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../css/reserve_info.css">
        <script type = "text/javascript" src = '../js/non_user_Button.js'></script>
    </head>

    <body>
        <div class = "header"><h2><a onclick = "location.href = 'login.php'">병원 통합 예약 시스템</a></h2></div>
        <form class = "user_info_form">

            <h1>예약 정보</h1>

            <table class = "user_info">
                <?php
                    session_start();

                    $phone1 = $_SESSION['phone1'];
                    $phone2 = $_SESSION['phone2'];

                    $host = "localhost";
                    $user = "kyj";
                    $pw = "1234";
                    $dbname = "proj";
                    $mysqli = new mysqli($host, $user, $pw, $dbname);

                    $sql = "select * from nonuser where phone1 = '$phone1' and phone2 = '$phone2'";

                    $result = $mysqli->query($sql);

                    while ($row = $result->fetch_assoc()):
                ?>  

                <tr>
                    <th class = "hospital_tr"><b>병원명</b></th>
                    <td><p><?php echo $row['hospital'] ?></p></td>
                </tr>

                <tr class = "name_tr">
                    <th class = "usr_name"><b>이름</b></th> 
                    <td><p><?php echo $row['name'] ?><p></td>
                </tr>

                <tr class = "date_tr">
                    <th class = "usr_date"><b>진료 날짜</b></th>
                    <td><p><?php echo $row['date'] ?>   <?php echo $row['time'] ?><p></td>
                </tr>

                <tr class = "medical_tr">
                    <th class = "usr_medical"><b>진료과</b></th>
                    <td><p><?php echo $row['medical'] ?></p></td>
                </tr>

                <tr class = "symptom_tr">
                    <th class = "usr_symptom"><b>증상</b></th>
                    <td class = "symptom"><p><?php echo $row['symptom'] ?></p></td>
                </tr>
                <?php endwhile ?>
            </table>

            <br>

            <div class = "btn_div">
                    <button type = "button" class = "change_btn" onclick = "Change()"><b>예약 변경</b></button>
                    <button type = "button" class = "rm_btn" onclick = "Remove()"><b>예약 취소</b></button>
            </div>
        </form>
    <body>  
</html>