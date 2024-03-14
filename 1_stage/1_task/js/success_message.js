function onInput_form()
{
    var username = document.getElementById('username')
    var message = document.getElementById('message')
    var email = document.getElementById('email')
    var file = document.getElementById('file')

    var success_message = document.getElementById('success_message')

    if (username.value && message.value && email.value && onInput_email() && file.value && onInput_file()) {
        success_message.hidden = false;
    } else {
        success_message.hidden = true;
    }
}

document.getElementById('some_form').addEventListener('input', onInput_form);
