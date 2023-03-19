$(document).ready(function() {
    $("#login-form form").submit(function(event) {
        event.preventDefault();
        $.post("login.php", {
            username: $("#login-form input[name='username']").val(),
            password: $("#login-form input[name='password']").val()
        }, function(data) {
            if (data === "success") {
                $("#login-form").hide();
                $("#message-list").show();
                $("#message-form").show();
                $.post("save-message.php", {
                    message: $("#login-form input[name='username']").val() + " joined the chat"
                }, function(data) {
                    // Display the login message in the message list
                    $("<div>").text($("#login-form input[name='username']").val() + " joined the chat").appendTo("#message-list");
                });
                setInterval(function() {
                    // Update the message list every 2 seconds
                    $.get("get-messages.php", function(data) {
                        $("#message-list").html(data);
                    });
                }, 200);
            } else {
                alert(data);
            }
        });


function loadMessages() {
    $.get("get-messages.php", function(data) {
        $("#message-list").html(data);
        $("#message-list").scrollTop($("#message-list")[0].scrollHeight);
        setTimeout(loadMessages, 200);
    });
}

$("#message-form form").submit(function(event) {
    event.preventDefault();
    var formData = $(this).serialize();
    formData += "&name=" + encodeURIComponent("<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>");
    $.post("save-message.php", formData, function(data) {
        if (data === "Please enter your message." || data === "You are not logged in.") {
            alert(data);
        }
        $("#message-form form")[0].reset();
    });
});