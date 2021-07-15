function dispMatches() {
    $.ajax({
        type: "POST",
        url: "match.php",
        data: {game:$("#games").val(), comp:$("input[type=radio]:checked").val()},
        success: function(res) {
            $("#tblMatches").html(res);
        }
    });
}
$(document).ready(function() {
    $(".formTable *").change(function() {
        dispMatches();
    })
    $.ajax({
        url: "verify_user_function.php",
        success: function(res) {
            if (res == "Not logged in! Redirecting...") {
                window.location.replace("login_page.php");
            }
        }
    });
})