    // 예약 정보 변경 확인
function Change() {
    var msg = "변경하시겠습니까?";
    var result = confirm(msg);

    if($('#medical').val() && $('#symptom').val() && $('#date').val() && $('#time').val()) {
        if (result) {
            $.ajax({
                type: "post",
                url: '../change_check.php',
                data: {
                    medical: $('#medical').val(),
                    symptom: $('#symptom').val(),
                    date: $('#date').val(),
                    time: $('#time').val()
                },
                success: function(response) {
                    if(response) {
                        alert("예약이 변경되었습니다.");
                        location.href = "../user_reserve_info.php";
                    }
                }
            });
        }
    } else {
        alert("정보를 다시 입력해주세요.");
    }
}   