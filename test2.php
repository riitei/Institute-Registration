
<HTML>
<HEAD>
    <TITLE>身份證字號驗證範例表單</TITLE>
</HEAD>
<SCRIPT Language="JavaScript">

    function CheckInput() {
        if ( ! checkLength( document.Form1.Name.value, 2 ) )
            window.alert( "姓名資料錯誤!" );
        if ( ! checkID( document.Form1.ID.value ) )
            window.alert( "身份證字號錯誤!" );
        if ( ! checkEmail( document.Form1.Email.value ) )
            window.alert( "Email 位址資料錯誤!" );
    }

    function checkLength( dat, len ) {
        return (dat.length >= len);
    }

    function checkEmail( id ) {
        return ( checkLength(id, 5) && id.indexOf("@") != -1 );
    }

    function checkID( id ) {
        tab = "ABCDEFGHJKLMNPQRSTUVWXYZIO"
        A1 = new Array (1,1,1,1,1,1,1,1,1,1,2,2,2,2,2,2,2,2,2,2,3,3,3,3,3,3 );
        A2 = new Array (0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5,6,7,8,9,0,1,2,3,4,5 );
        Mx = new Array (9,8,7,6,5,4,3,2,1,1);

        if ( id.length != 10 ) return false;
        i = tab.indexOf( id.charAt(0) );
        if ( i == -1 ) return false;
        sum = A1[i] + A2[i]*9;

        for ( i=1; i<10; i++ ) {
            v = parseInt( id.charAt(i) );
            if ( isNaN(v) ) return false;
            sum = sum + v * Mx[i];
        }
        if ( sum % 10 != 0 ) return false;
        return true;
    }
</SCRIPT>


<FORM Name=Form1>



             姓名:

                <INPUT Type=Text Name=Name Size=20><br>

               身份證字號:

                <INPUT Type=Text Name=ID Size=20><br>

               Email 位址:

                <INPUT Type=Text Name=Email Size=50><br>








              <INPUT Type=Button Value="送出" OnClick="CheckInput();">

             <INPUT Type=Reset Value="清掉重寫">



  </FORM>

</BODY>
</HTML>