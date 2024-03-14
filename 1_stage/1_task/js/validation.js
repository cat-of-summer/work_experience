const EMAIL_REGEXP = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
const FILE_REGEXP = /.png|.jpg/;

function onInput_file()
{
    var file = document.getElementById("file");

    if (FILE_REGEXP.test(file.value)) {
        file.classList.remove("is-invalid");
        file.classList.add("is-valid");
        return true;
    } else {
        file.classList.add("is-invalid");
        return false;
    }
}

function onInput_email()
{
    var email = document.getElementById("email");

    if (EMAIL_REGEXP.test(email.value)) {
        email.classList.remove("is-invalid");
        email.classList.add("is-valid");
        return true;
    } else {
        email.classList.add("is-invalid");
        return false;
    }
}

document.getElementById("email").addEventListener('input', onInput_email);
document.getElementById("file").addEventListener('input', onInput_file);