window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('submit').addEventListener('click', login);
});
function login () {
    hideAlert ();

    var id = document.getElementById('email-input').value.trim();
    var pw = document.getElementById('password-input').value.trim();

    if (id !== '' && pw !== '') {
        $.ajax({
            url: './lib/login.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                pw: pw
            },
            beforeSend: function () {
                document.getElementById('submit').setAttribute('disabled', true);
            },
            success: function () {
                location.href = 'test.php';
            },
            error: function (error) {
                console.log(error);

                document.getElementById('submit').removeAttribute('disabled');
                showAlert ();
            }
        });
    }
    else {
        showAlert ();
    }
}
function showAlert () {
    document.getElementById('login-failed').classList.add('active');
}
function hideAlert () {
    document.getElementById('login-failed').classList.remove('active');
}
