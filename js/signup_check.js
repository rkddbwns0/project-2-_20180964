function signup_Check() {
    var name = document.getElementById("name");
    var id = document.getElementById("id");
    var pw = document.getElementById("pw");
    var pwc = document.getElementById("pwc");
    var jumin1 = document.getElementById("jumin1");
    var jumin2 = document.getElementById("jumin2");
    var phone = document.getElementById("phone");
    var phone1 = document.getElementById("phone1");
    var phone2 = document.getElementById("phone2");

    // 정규식

    var idReg = /^[a-zA-Z0-9]{4,12}$/;
    var pwReg = /^[a-zA-Z0-9]{6,20}$/;
    

    if(name.value == "") {
        alert("이름을 입력해주세요.");
        name.focus();
        return false;
    }

    if(id.value == "") {
        alert("아이디를 입력해주세요.");
        id.focus();
        id.textContent = ""
        return false;
    } else if (!idReg.test(id.value)) {
        alert("아이디는 4~12자 영문 대소문자, 숫자만 입력해주세요.");
        id.focus();
        return false;
    }

    if(pw.value == "") {
        alert("비밀번호를 입력해주세요.");
        pw.focus();
        return false;
    } else if(!pwReg.test(pw.value)) {
        alert("비밀번호는 6~20자 영문 대소문자, 숫자만 입력해주세요.");
        pw.focus();
        return false;
    }

    if(id.value == pw.value) {
        alert("아이디와 동일한 비밀번호는 사용할 수 없습니다.");
        pw.focus();
        return false;
    }

    if(pwc.value == "") {
        alert("비밀번호 확인을 입력해주세요.");
        pwc.focus();
        return false;
    }

    if(pw.value != pwc.value) {
        alert("비밀번호가 동일하지 않습니다.");
        pwc.focus();
        return false;
    }

    if (jumin1.value == "") {
        alert("주민번호를 입력해주세요.");
        jumin1.focus();
        return false;
    } else if (jumin2.value == "") {
        alert("주민번호를 입력해주세요.");
        jumin2.focus();
        return false;
    }

    if (phone.value == "") {
        alert("연락처를 입력해주세요.");
        phone.focus();
        return false;
    } else if (phone1.value == "") {
        alert("연락처를 입력해주세요.");
        phone1.focus();
        return false;
    } else if (phone2.value == "") {
        alert("연락처를 입력해주세요.");
        phone2.focus();
        return false;
    }

    document.signup_form.submit();
}