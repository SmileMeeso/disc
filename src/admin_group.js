window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('goto-admin').addEventListener('click', function () {
        location.href = 'admin.php';
    });
    document.getElementById('add').addEventListener('click', clickAdd);
    document.querySelectorAll('.edit.btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) { clickEditButton (e) });
    });
    document.querySelectorAll('.delete.btn').forEach(function (btn) {
        btn.addEventListener('click', function (e) { clickDeleteButton (e) });
    });
});
function clickAdd () {
    var tbody = document.querySelector('tbody');
    var tr = document.getElementById('tr').cloneNode(true).content.querySelector('tr');

    tr.querySelector('.submit').addEventListener('click', function (e) {
        clickSubmitLine (e);
    });

    tbody.appendChild(tr);
}
function clickSubmitLine (e) {
    hideAlert ();

    var tr = e.target;

    while (tr.tagName != 'TR') {
        tr = tr.parentElement;
    }

    var groupName = tr.querySelector('.group_name input').value.trim();

    $.ajax({
        url: './lib/admin_add_group.php',
        data: {
            groupName: groupName,
        },
        dataType: 'JSON',
        type: 'POST',
        success: function (data) {
            showAlert ('submit-success');

            tr.dataset.id = data;
            tr.querySelector('.btn-success').remove();
            tr.querySelector('.btn-danger').remove();

            var submitButton = document.getElementById('submit-button').cloneNode(true).content.querySelector('button');
            var deleteButton = document.getElementById('delete-button').cloneNode(true).content.querySelector('button')

            submitButton.addEventListener('click', function (e) { clickEditButton (e); });
            deleteButton.addEventListener('click', function (e) { clickDeleteButton (e); });

            tr.querySelector('.blue-btn').appendChild(submitButton);
            tr.querySelector('.red-btn').appendChild(deleteButton);
        },
        error: function (error) {
            showAlert ('submit-failed');
        }
    });
}
function clickEditButton (e) {
    hideAlert ();

    var tr = e.target;

    while (tr.tagName != 'TR') {
        tr = tr.parentElement;
    }

    var id = parseInt(tr.dataset.id);
    var groupName = tr.querySelector('.group_name input').value.trim();

    $.ajax({
        url: './lib/admin_group_edit_line.php',
        data: {
            id: id,
            group_name: groupName
        },
        dataType: 'JSON',
        type: 'POST',
        success: function (data) {
            showAlert ('submit-success');
        },
        error: function (error) {
            showAlert ('submit-failed');
        }
    });
}
function clickDeleteButton (e) {
    hideAlert ();

    var tr = e.target;

    while (tr.tagName != 'TR') {
        tr = tr.parentElement;
    }

    var id = parseInt(tr.dataset.id);

    $.ajax({
        url: './lib/admin_group_delete_line.php',
        data: {
            id: id
        },
        dataType: 'JSON',
        type: 'POST',
        success: function () {
            showAlert ('submit-success');
            tr.remove();
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
