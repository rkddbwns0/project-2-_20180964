<!DOCTYPE HTML>
<html>
    <head>
        <meta charset = "utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type = "text/javascript" src = "../js/Button.js"></script>
        <link rel = "stylesheet" href = "../css/user_page.css">
    </head>

    <body>
        <form class = "user_page" method = "post" action = "change_info.php" enctype = "multipart/form-data">
            <?php
                session_start();

                $id = $_SESSION['id'];

                $host = "localhost";
                $user = "kyj";
                $pw = "1234";
                $dbname = "proj";
                $mysqli = new mysqli($host, $user, $pw, $dbname);

                $sql = "select name, phone1, phone2, id, pw, jumin1, jumin2 from user where id = '$id'";

                $result = $mysqli->query($sql);

                while($row = $result->fetch_assoc()):
            ?>  
            
            <div class = "user_info">
                <h1>회원 정보</h1>

                <span class = "line"></span>

                <div class = "name_txt">
                    <label class = "user_name"><span class = label_text"><b>이름</b></label>
                    <input type = "text" value = " <?php echo $row['name']; ?>" id = "name" name = "name" readonly/>  
                </div> 

                <span class = "line"></span>
                
                <div class = "id_txt">
                    <label class = "user_id"><b>아이디</b></label>
                    <input text = "text" value =" <?php echo $row['id']; ?>" id = "id" name = "name" readonly/>
                </div>

                <span class = "line"></span>
                
                <div class = "pw_txt">
                    <label class = "user_pw"><b>비밀번호</b></label>
                    <input type = "password" id = "pw" name = "pw">
                </div>

                <span class = "line"></span>

                <div class = "pwc_txt">
                    <label class = "user_pwc"><b>비밀번호 확인</b></label>
                    <input type = "password" id = "pwc" name = "pwc">
                </div>

                <span class = "line"></span>

                <div class = "phone_txt">
                    <label class = "user_phone"><b>연락처</b></label>
                    <input type = "text" value = " 010" id = "phone" name = "phone" readonly/> - <input type = "text" value = " <?php echo $row['phone1'] ?>" id = "phone1" name = "phone1" readonly/> - <input type = "text" value = " <?php echo $row['phone2'] ?>" id = "phone2" name = "phone2" readonly/>
                </div>

                <span class = "line"></span>

                <div class = "jumin_txt">
                    <label class = "user_jumin"><b>주민번호</b></label>
                    <input type = "text" value = " <?php echo $row['jumin1'] ?>" id = "jumin1" name = "jumin2" readonly/> - <input type = "text" value = " <?php echo $row['jumin2'][0].str_repeat('*', strlen($row['jumin2']) - 1); ?>" id = "jumin2" name = "jumin2" readonly/>
                </div>
                <?php endwhile ?>
            </div>

            <span class = "line"></span>

            <div class = "btn">
                <button type = "submit" class = "change_pw"><b>수정하기</b></button>
                <button type = "button" onclick = "Remove()" class = "user_rm"><b>회원탈퇴</b></button>
            </div>
        </form>
    </body>
</html>