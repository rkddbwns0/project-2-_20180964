// 로그아웃
function Logout() {
    var msg = "로그아웃 하시겠습니까?";
    var result = confirm(msg);

    if(result) {
        location.href = "../logout.php";
    }
}
