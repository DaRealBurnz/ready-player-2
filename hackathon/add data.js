function new_usr() {
    if ($("#password") !== $("#conf_password")) {
        $("label")[5].css("color", "red")
    }
    $.ajax({
        type: "POST",
        url: "add.php",
        data: {fname:$("#fname").val(), lname:$("#lname").val(), email:$("#email").val(), discord:$("#discord").val(), password:$("#password").val()},
        success: function(res) {
            if (res == "Done") {
                var form = $('<form action="login_page.php" method="post" style="display:none">' +
                    '<input type="text" name="email" value="' + $("#email").val() + '" />' +
                    '<input type="text" name="password" value="' + $("#password").val() + '" />' +
                    '</form>');
                $('body').append(form);
                form.submit();
            } else {
                errors = res.split(",")
                errors.forEach(function(value, index, array) {
                    $("label")[value].css("color","red")
                })
            }
        }
    });
}