<html>
    <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type = "text/javascript" src = "../js/Logout.js"></script>
        <link rel = "stylesheet" href = "../css/user_main.css">
    </head>

    <body>
        <form>
            <div class = "main_form">
                <?php
                    session_start();

                    $id = $_SESSION['id'];

                    $host = 'localhost';
                    $user = 'kyj';
                    $pw = '1234';
                    $dbname = 'proj';
                    $mysqli = new mysqli($host, $user, $pw, $dbname);

                    $sql = "select * from user where id = '$id'";

                    $result = $mysqli->query($sql);

                    while($row = $result->fetch_assoc()):
                ?>

                <h1>병원 예약 통합 서비스</h1>

                <p><?php echo $row['name']; ?>님 반갑습니다</p>

                <?php endwhile ?>
                
                <br>

                <button type = "button" onclick = "location.href = 'hospital_info.php'" class = "reserve_btn"><b>예약하기</b></button>
                <br><br>
                <button type = "button" onclick = "location.href = 'user_reserve_info.php'" class = "reserve_info_btn"><b>예약정보</b></button>
                <br><br>
                <button type = "button" onclick = "location.href = 'user_page.php'" class = "user_btn"><b>회원정보</b></button>
                <br><br>
                <button type = "button" onclick = "Logout()" class = "logout_btn"><b>로그아웃</b></button>
            </div>
        </form>
    </body>
</html>


