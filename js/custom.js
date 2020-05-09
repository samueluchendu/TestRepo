function emailFunction() {
    var x = document.getElementById("Email").pattern;
    document.getElementById("demo").innerHTML = x;
}


function passFunction() {
    var x = document.getElementById("passInput");
    if (x.type == "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
}



