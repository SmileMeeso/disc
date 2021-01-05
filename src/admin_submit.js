window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('goto-admin').addEventListener('click', function () {
        location.href = 'admin.php';
    });
    document.querySelectorAll('.submit').forEach(function (b) {
        b.addEventListener('click', function (e) {
            submitUser (e);
        });
    })
});

function submitUser (e) {
    hideAlert ();

    var button = e.target;
    var id = button.dataset.id;
    var tr = e.target;

    while (tr.tagName != 'TR') {
        tr = tr.parentElement;
    }

    $.ajax({
        url: './lib/admin_submit.php',
        data: {
            id: id
        },
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            tr.remove();
        },
        error: function (error) {
            showAlert();
        }
    });
}
function showAlert () {
    document.getElementById('submit-failed').classList.add('active');
}
function hideAlert () {
    document.getElementById('submit-failed').classList.remove('active');
}
