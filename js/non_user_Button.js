function Remove() {
    var msg = "예약을 취소하시겠습니까?";
    var result = confirm(msg);

    if (result) {
        location.href = "../non_user_info_rm.php";
    }
}

function Change() {
    var msg = "예약을 변경하시겠습니까?";
    var result = confirm(msg);

    if(result) {
        location.href = "non_user_change_reserve.php";
    }
}



function non_user_change() {
    var msg = "변경하시겠습니까?";
    var result = confirm(msg);

    if($('#medical').val() && $('#symptom').val() && $('#date').val() && $('#time').val()) {
        if(result) {
            $.ajax({
                type: 'post',
                url: '../non_user_change_check.php',
                data: {
                    medical: $('#medical').val(),
                    symptom: $('#symptom').val(),
                    date: $('#date').val(),
                    time: $('#time').val()
                },
                success: function(response) {
                    if(response){
                        alert("예약이 변경되었습니다.");
                        location.href = '../non_user_info.php';
                    }
                }
            });
        }
    } else {
        alert("정보를 다시 입력해주세요.");
    }
}