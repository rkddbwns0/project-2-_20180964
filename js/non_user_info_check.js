function Check_Info() {
    var name = document.getElementById("name");
    var jumin1 = document.getElementById("jumin1");
    var jumin2 = document.getElementById("jumin2");
    var phone = document.getElementById("phone");
    var phone1 = document.getElementById("phone1");
    var phone2 = document.getElementById("phone2");

    if (name.value == "") {
        alert("이름을 입력해주세요.");
        name.focus();
        return false;
    }

    if(jumin1.value == "") {
        alert("주민번호를 입력해주세요.");
        jumin1.focus();
        return false;
    } else if (jumin2.value == ""){
        alert("주민번호를 입력해주세요.");
        jumin2.focus();
        return false;
    }

    if(phone.value == "") {
        alert("연락처를 입력해주세요.");
        phone.focus();
        return false;
    } else if(phone1.value == "") {
        alert("연락처를 입력해주세요.");
        phone1.focus();
        return false;
    } else if (phone2.value == "") {
        alert("연락처를 입력해주세요.");
        phone2.focus();
        return false;
    }

    document.info_check.submit();
}