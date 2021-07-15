function new_usr() {
    success = true;
    $("label").css("color","black");
    if ($("#password").val() !== $("#conf_password").val()) {
        $("label#5").css("color", "red");
        success = false;
    }
    $.ajax({
        type: "POST",
        url: "add.php",
        data: {fname:$("#fname").val(), lname:$("#lname").val(), email:$("#email").val(), discord:$("#discord").val(), password:$("#password").val()},
        success: function(res) {
            //$('body').append(res);
            if (res === "Done" && success === true) {
                $('body').append(res);
                var form = $('<form action="login_page.php" method="post" style="display:none">' +
                    '<input type="text" name="email" value="' + $("#email").val() + '" />' +
                    '<input type="text" name="password" value="' + $("#password").val() + '" />' +
                    '</form>');
                $('body').append(form);
                form.submit();
            } else {
                errors = res.split(",");
                errors.pop();
                errors.forEach(function(value, index, array) {
                    $("label#"+value).css("color","red");
                })
            }
        }
    });
}