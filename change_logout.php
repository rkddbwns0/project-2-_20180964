<?php
    session_start();

    $result = session_destroy();

    if($result) {
?>
    <script>
        location.replace('login.php');
    </script>
<?php
    } 
?>