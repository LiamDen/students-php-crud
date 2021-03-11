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
    //password validation starts
    