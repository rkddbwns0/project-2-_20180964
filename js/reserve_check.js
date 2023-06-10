function Reserve_Check() {
    var medical = document.getElementById("medical");
    var symptom = document.getElementById("symptom");
    var date = document.getElementById("date");
    var time = document.getElementById("time");

    if (medical.value == "") {
        alert("진료과를 선택해주세요.");
        medical.focus();
        return false;
    }

    if (symptom.value == "") {
        alert("증상을 입력해주세요.");
        symptom.focus();
        return false;
    }

    if (date.value == "") {
        alert("진료 날짜를 선택해주세요.");
        date.focus();
        return false;
    }

    if (time.value == "") {
        alert("진료 시간을 선택해주세요.");
        time.focus();
        return false;
    }

    document.reserve_form.submit();
}