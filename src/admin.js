window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('goto-admin-login').addEventListener('click', function () {
        location.href = 'admin_login.php';
    });
    document.getElementById('goto-admin-join').addEventListener('click', function () {
        location.href = 'admin_join.php';
    });
    document.getElementById('goto-admin-submit').addEventListener('click', function () {
        location.href = 'admin_submit.php';
    });
    document.getElementById('goto-admin-user').addEventListener('click', function () {
        location.href = 'admin_user.php';
    });
    document.getElementById('goto-admin-result').addEventListener('click', function () {
        location.href = 'admin_result.php';
    });
    document.getElementById('goto-add-desc').addEventListener('click', function () {
        location.href = 'admin-desc.php';
    });
    document.getElementById('goto-add-question').addEventListener('click', function () {
        location.href = 'admin_question.php';
    });
    document.getElementById('goto-group').addEventListener('click', function () {
        location.href = 'admin_group.php';
    });
});
