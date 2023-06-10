function non_user_Reserve_Check() {
    var name = document.getElementById("name");
    var jumin1 = document.getElementById("jumin1");
    var jumin2 = document.getElementById("jumin2");
    var phone = document.getElementById("phone");
    var phone1 = document.getElementById("phone1");
    var phone2 = document.getElementById("phone2");
    var medical = document.getElementById("medical");
    var symptom = document.getElementById("symptom");
    var date = document.getElementById("date");
    var time = document.getElementById("time");
    
    if (name.value == "") {
        alert("이름을 입력해주세요.");
        name.focus();
        return false;
    }

    if (jumin1.value == "") {
        alert("주민번호를 입력해주세요.");
        jumin1.focus();
        return false;
    }

    if (jumin2.value == "") {
        alert("주민번호를 입력해주세요.");
        jumin2.focus();
        return false;
    }

    if (phone.value == "") {
        alert("연락처를 입력해주세요.");
        phone.focus();
        return false;
    }

    if (phone1.value == "") {
        alert("연락처를 입력해주세요.");
        phone1.focus();
        return false;
    }

    if (phone2.value =="") {
        alert("연락처를 입력해주세요.");
        phone2.focus();
        return false;
    }

    if (medical.value == "") {
        alert("진료과를 선택해주세요.");
        medical.focus();
        return false;
    }

    if (symptom.value == "") {
        alert("증상을 작성해주세요.");
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

    document.non_user_form.submit()
}