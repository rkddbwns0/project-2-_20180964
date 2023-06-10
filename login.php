<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../css/login.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;400&display=swap');
        </style>
    </head>
        <title>Sign in</title>
    </head>

    <body>    
        <form action =  "login_check.php" method = "post" enctype="multipart/form-data">
            
            <h1>병원 예약 통합 서비스</h1>

            <h4>로그인</h4>

            <div class = 'login_form' id ="login_form">
                <input type = "text" name = "id" id = "id" placeholder = "아이디">

                <br><br>

                <input type = "password" name = "pw" id = "pw" placeholder = "비밀번호">

                <br><br><br>

                <div>
                    <button type = "submit"class = "login_btn"><b>로그인</b></button> 
                </div>

                <div class = "signup_btn">
                    <a onclick = "location.href = 'signup.html'">회원가입</a>
                </div>
                
                <span class = "line_or">
                    <span class = "txt_or">또는</span>
                </span>

                <div>
                    <button type = "button" onclick = "location.href = 'non_user_hospital_info.php'" class = "non_user_reserve_btn"><b>비회원 예약하기</b></button>
                    <button type = "button" onclick = "location.href = 'non_user_info_check.php'" class = "non_user_check_btn"><b>비회원 예약 조회</b></button>
                </div>
                <br><br><br>
            </div>
        </form>
    </body>
</html>