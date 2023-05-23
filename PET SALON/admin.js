function passver(){
    var password=document.getElementById("password").value;
    if(password == "admin123"){
        alert("Login successfully");
        open("retrieve.php");
        return false;
    }
    else{
        alert("login failed");
        return false;
    }
}