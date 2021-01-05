window.addEventListener('DOMContentLoaded', function () {
    submit_type('SID');
    document.getElementById('goto-test').addEventListener('click', function () {
        location.href = 'test.php';
    });
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
            var val = data['disc_desc'] == null ? '설명이 등록되지 않았어요.' : data['disc_desc'];
            document.getElementById('text-area').innerHTML = val.replace(/\n/g, '<br>').trim();
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
