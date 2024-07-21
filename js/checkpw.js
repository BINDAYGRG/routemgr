function checkPasswordMatch() {
    var pass = $("#password").val();
    var repass = $("#re-password").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!");
    else
        $("#divCheckPasswordMatch").html("Passwords match.");
}