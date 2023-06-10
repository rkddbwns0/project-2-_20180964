<html>
    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8"> 

    <?php

        $host = 'localhost';
        $user = 'kyj';
        $pw = '1234';
        $dbname = 'proj';
        $mysqli = new mysqli($host, $user, $pw, $dbname);

        $id = $_POST['id']; 
        $name = $_POST['name'];
        $jumin1 = $_POST['jumin1'];
        $jumin2 = $_POST['jumin2'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $pw = $_POST['pw'];
        $pwc = $_POST['pwc'];

        $sql = "insert into user (id, name, jumin1, jumin2, phone1, phone2, pw, pwc)";

        $sql = $sql. "values('$id', '$name', '$jumin1', '$jumin2', '$phone1', '$phone2', '$pw', '$pwc')";

        if($mysqli->query($sql)){ 
            echo "<script>alert('회원가입이 완료되었습니다!')</script>"; 
        } else {
            echo "<script>alert('회원정보를 다시 입력해주세요.')</script>";
            echo "<script>history.back();</script>";
        }

        mysqli_close($mysqli);
        
    ?>

    <script>
        location.href = 'login.php';
    </script>
</html>