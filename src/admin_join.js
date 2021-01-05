window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('submit').addEventListener('click', checkSubmit);
    document.getElementById('email-input').addEventListener('input', function (e) {
        var id = e.target.value;

        removeActiveAlert ();
        checkId (id);
    });
    document.getElementById('email-input').addEventListener('blur', function (e) {
        var id = e.target.value;

        removeActiveAlert ();
        checkId (id);
    });
    document.getElementById('name-input').addEventListener('input', function (e) {
        var name = e.target.value;

        removeActiveAlert ();
        checkName (name);
    });
    document.getElementById('name-input').addEventListener('blur', function (e) {
        var name = e.target.value;

        removeActiveAlert ();
        checkName (name);
    });
});
function checkSubmit () {
    var flag = true;

    var id = document.getElementById('email-input').value.trim();
    var pw = document.getElementById('password-input').value.trim();
    var name = document.getElementById('name-input').value.trim();

    removeActiveAlert ();

    var idFlag = checkId (id);
    var passwordFlag = checkPassword (pw);
    var nameFlag = checkName(name);

    if (idFlag && nameFlag && passwordFlag) {
        doSubmit(id, pw, name);
    }
}
function doSubmit (id, pw, name) {
    if (id && pw) {
        $.ajax({
            url: './lib/admin_join.php',
            data: {
                id: id,
                pw: pw,
                name: name
            },
            type: 'POST',
            dataType: 'JSON',
            beforeSend: function () {
                document.getElementById('submit').setAttribute('disabled', true);
            },
            success: function (data) {
                location.href = './admin_join_result.php'
            },
            error: function (error) {
                document.getElementById('submit').removeAttribute('disabled');
                showAlert('login-failed');
            }
        });
    }
}
function checkId (id) {
    var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;

    if (regExp.test(id)) {
        $.ajax({
            url: './lib/admin-check-email-dup.php',
            data: {
                id: id
            },
            type: 'POST',
            dataType: 'JSON',
            success: function (data) {
                if (data.length > 0) {
                    showAlert('email-dup-alarm');
                }
            }
        });
    }
    else {
        if (checkActiveAlert ()) {
            showAlert('email-check-alarm');
        }

        return false;
    }

    return true; // 비동기 값 넘어올 때 까지 기다릴 수 없으니 true 처리하고 서버에서 한 번 더 검사
}
function checkName (name) {
    // 이름 10자 초과
    if (name.length > 10) {
        if (checkActiveAlert ()) {
            showAlert('name-check-alarm');
        }

        return false;
    }
    // 이름 입력 안함
    else if (name.length == 0) {
        if (checkActiveAlert ()) {
            showAlert ('name-check2-alarm');
        }

        return false;
    }
    else {
        return true;
    }
}
function checkPassword (password) {
    if (password.length == 0) {
        showAlert ('password-check-alarm');
        return false;
    }
    else {
        return true;
    }
}
function removeActiveAlert () {
    var activeAlert = document.querySelectorAll('.alert.active');

    activeAlert.forEach(function (alert) {
        alert.classList.remove('active');
    });
}
function checkActiveAlert () {
    var activeAlert = document.querySelectorAll('.alert.active');

    if (activeAlert.length > 0) {
        return false;
    }
    else {
        return true;
    }
}
function showAlert (id) {
    if (checkActiveAlert ()) {
        document.getElementById(id).classList.add('active');
    }
}
