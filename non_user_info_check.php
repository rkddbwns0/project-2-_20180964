<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../css/non_user_info_check.css">
        <script type = "text/javascript" src = "../js/non_user_info_check.js"></script>
    </head>
    <body>
        <form action = "non_user_reserve_info.php" method = "post" enctype = "multipart/form-data" name = "info_check">
            <h1>비회원 예약정보 확인</h1>
            
            <br>

            <input type = "text" id = "name" name = "name" placeholder = "이름">
            <br><br>
            <input type = "text" id = "jumin1" name = "jumin1" maxlength = "6" placeholder = "주민번호"> - <input type = "password" id = "jumin2" name = "jumin2" maxlength = "7">
            <br><br>
            <input type = "text" id = "phone" name = "phone" maxlength = "3" placeholder = "연락처"> - <input type = "text" id = "phone1" name = "phone1" maxlength = "4"> - <input type = "text" id = "phone2" name = "phone2" maxlength = "4">
            <br><br><br><br>
            <button type = "button" onclick = 'Check_Info()'><b>예약 확인하기</b></button>
        </form>
    </body>
</html>