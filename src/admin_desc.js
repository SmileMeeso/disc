window.addEventListener('DOMContentLoaded', function () {
    submit_type('SID');
    document.getElementById('goto-admin').addEventListener('click', function () {
        location.href = 'admin.php';
    });
    document.getElementById('submit').addEventListener('click', clickSubmit);
    document.getElementById('submit_type').addEventListener('change', function (e) { submit_type(e); });
});
function submit_type(e) {
    hideAlert();

    if (typeof e == 'object') {
        var i = e.target;

        while (!i.classList.contains('form-select')) {
            i = i.parentElement;
        }

        i = i.value;
    }
    else {
        var i = e;
    }

    $.ajax({
        url: './lib/admin_desc_load.php',
        data: {
            disc_type: i
        },
        dataType: 'JSON',
        type: 'POST',
        success: function (data) {
            var val = data['disc_desc'] == null ? '' : data['disc_desc'];
            document.getElementById('text-area').value = val.trim();
        },
        error: function (error) {
            showAlert ('submit-failed');
        }
    });
}
function clickSubmit () {
    hideAlert();

    var discType = document.getElementById('submit_type').value.trim();
    var discDesc = document.getElementById('text-area').value.trim();

    $.ajax({
        url: './lib/admin_desc_edit.php',
        data: {
            disc_type: discType,
            disc_desc: discDesc
        },
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            showAlert('submit-success');
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
