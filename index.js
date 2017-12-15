
function CheckInput() {
    $error = 0;

    // if (!checkLength(document.Form.name.value, 2)) {
    //     window.alert("姓名資料錯誤!");
    //     $error++;
    // }
    //
    // if (!checkID(document.Form.id.value)) {
    //     window.alert("身份證字號錯誤!");
    //     $error++;
    // }
    //
    // emailRule = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z]+$/;
    // if (emailRule.test(Form.email.value)==false) {
    //     window.alert("Email 位址資料錯誤!");
    //     $error++
    // }
    // reg = /^09[0-9]{8}$/;
    // if (reg.test(Form.phone.value) == false) {
    //     window.alert('行動電話格式錯誤，範例:0912345678');
    //     $error++
    // };
    // console.log(Form.phone.value);
    //
    // if(Form.school.value=="school_null"){
    //     window.alert("請選擇畢業學校");
    //     $error++;
    // }
    // if(Form.school_department.value=="school_department_null"){
    //     window.alert("請選擇畢業科系");
    //     $error++;
    // }

    // if ($error == 0) {
    //     if (window.confirm("確定提交表單嗎?")) {
    //         document.getElementsByName("Form").submit();
    //     }
    // }
}

function checkLength(dat, len) {
    return (dat.length >= len);
}

function checkEmail(id) {
    return (checkLength(id, 5) && id.indexOf("@") != -1);
}

function checkID(id) {
    tab = "ABCDEFGHJKLMNPQRSTUVWXYZIO"
    A1 = new Array(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 3);
    A2 = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, 1, 2, 3, 4, 5);
    Mx = new Array(9, 8, 7, 6, 5, 4, 3, 2, 1, 1);

    if (id.length != 10) return false;
    i = tab.indexOf(id.charAt(0));
    if (i == -1) return false;
    sum = A1[i] + A2[i] * 9;

    for (i = 1; i < 10; i++) {
        v = parseInt(id.charAt(i));
        if (isNaN(v)) return false;
        sum = sum + v * Mx[i];
    }
    if (sum % 10 != 0) return false;
    return true;
}
