window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('goto-admin').addEventListener('click', function () {
        location.href = 'admin.php';
    });
    document.querySelectorAll('.submit.btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) { clickSubmitButton (e) });
    });
});
function clickSubmitButton (e) {
    hideAlert ();

    var tr = e.target;

    while (tr.tagName != 'TR') {
        tr = tr.parentElement;
    }

    var groupName = tr.querySelector('.group_name').textContent.trim();

    $.ajax({
        url: './lib/group_select.php',
        data: {
            group_name: groupName
        },
        dataType: 'JSON',
        type: 'POST',
        success: function (data) {
            showAlert ('submit-success');
            location.href = 'test.php';
        },
        error: function (error) {
            showAlert ('submit-failed');
        }
    });
}
function showAlert (id) {
    document.getElementById(id).classList.add('active');
}
function hideAlert () {
    document.querySelectorAll('.alert').forEach(function (a) {
        a.classList.remove('active');
    });
}
