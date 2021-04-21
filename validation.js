//user id validation starts
function username_validation(){
    'use strict';
    var username_name = document.getElementById("username");
    var username_value = document.getElementById("username").value;
    var username_length = username_value.length;
    if(username_length<5 || username_length>25)
    {
    document.getElementById('name_err').innerHTML = 'Value must not be less than 7 characters and greater than 12 characters';
    username_name.focus();
    document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('name_err').innerHTML = 'Valid user id';
    document.getElementById('name_err').style.color = "#00AF33";
    }
    }
    //user id validation ends
    //email validation starts
    function email_validation() {
        'use strict';
        var idformat = /^(.+)@(.+)$/;
        var id_name = document.getElementById("email");
        var id_value = document.getElementById("email").value;
        var id_length = id_value.length;
        if (!id_value.match(idformat) || id_length === 0) {
            document.getElementById('email_err').innerHTML = 'This is not a valid email the format is example@example.com.';
            id_name.focus();
            document.getElementById('email_err').style.color = "#FF0000";
        }
        else {
            document.getElementById('email_err').innerHTML = 'Valid Email';
            document.getElementById('email_err').style.color = "#00AF33";
        }
    }