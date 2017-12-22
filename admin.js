
var deleteDepartmentID = '';
var updateDepartmentID = '';
var updateDegree = '';
var updateClass = '';

$(document).ready(function () {
    //------------ 新增
    $("#add").click(function () {
        if ($('#addName').val() != "") {
            $.post("ajax/AddNTCUDepartment.php", {
                    addName: $("#addName").val(),
                    addDegree: $("#addDegree").val(),
                    addClass: $("#addClass").val()
                },
                function (data) {
                    alert(data);
                    history.go(0);
                });

        } else {
            alert("請輸入科系名稱");
        }
    });

    //------------ 更新
    $("#updateDepartment").change(function () {
        updateDepartmentID = $("#updateDepartment").val();
        console.log(updateDepartmentID);
    });
    $("#updateDegree").change(function () {
        updateDegree = $("#updateDegree").val();
        console.log(updateDegree);
    });
    $("#updateClass").change(function () {
        updateClass = $("#updateClass").val();
        console.log(updateClass);
    });

    $("#update").click(function () {
        if (updateDepartmentID != "" && updateDepartmentID != "school_null"
            && $("#updateName").val() != ""
            && updateDegree != "degree_null" && updateClass != "class_null") {

            $.post("ajax/UpdateNTCUDepartment.php", {
                    updateDepartmentID: updateDepartmentID,
                    updateDepartmenName: $("#updateName").val(),
                    updateDepartmenDegree: updateDegree,
                    updateDepartmenClass: updateClass
                },
                function (data) {
                    alert(data);
                    history.go(0);
                });
        } else {
            alert("請選擇更新科系名稱");
            history.go(0);

        }

    });


    //------------ 刪除
    $("#deleteDepartment").change(function () {//選取下拉式選單的
        deleteDepartmentID = $("#deleteDepartment").val();
    });

    $("#delete").click(function () {
        if (deleteDepartmentID != "" && deleteDepartmentID != "school_null") {
            // console.log("ok "+deleteDepartmentID)
            $.post("ajax/DeleteNTCUDepartment.php", {
                    deleteDepartmentID: deleteDepartmentID
                },
                function (data) {
                    alert(data);
                    history.go(0);
                });
        } else {
            alert("請選擇刪除科系名稱");
            history.go(0);

            // console.log("error "+deleteDepartmentID);
        }

    });
});