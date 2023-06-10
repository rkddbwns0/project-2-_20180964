// 예약 정보 삭제
function Delete() {
    var msg = "예약을 취소하시겠습니까?";
    var result  = confirm(msg);

    if (result) {
        location.href = '../delete.php';
    } 
}

// 예약 정보 변경
function Reserve_Change() {
    var msg = "예약을 변경하시겠습니까?";
    var result = confirm(msg);

    if (result) {
        location.href = '../reserve_change.php';
    }
}

function Remove() {
    var msg = "회원을 탈퇴하시겠습니까?";
    var result = confirm(msg);

    if(result) {
        location.href = "../rm_user.php";
    }
}