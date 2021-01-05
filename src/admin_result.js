window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('goto-admin').addEventListener('click', function () {
        location.href = 'admin.php';
    });
    document.querySelectorAll('.submit').forEach(function (b) {
        b.addEventListener('click', function (e) {
            submitUser (e);
        });
    });
    document.getElementById('search-form').addEventListener('input', function (e) {
        searchUser (e);
    });
});
function searchUser (e) {
    var input = e.target;
    var searchQuery = input.value.trim();
    var searchType = document.getElementById('search_type').value;

    $.ajax({
        url: './lib/admin_search.php',
        data: {
            query: searchQuery,
            type: searchType
        },
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            console.log(data);
            removeTR ();
            makeTr (data);
        },
        error: function (error) {
            console.log(error);
        }
    });
}
function makeTr (data) {
    document.getElementById('total').textContent = data.length;

    var tbody = document.querySelector('tbody');

    data.forEach(function (dt, idx) {
        var tr = document.getElementById('tr').cloneNode(true).content.querySelector('tr');

        tr.querySelector('th').textContent = idx + 1;
        tr.querySelector('.name').textContent = dt.name;
        tr.querySelector('.id').textContent = dt.id;
        tr.querySelector('.group_name').textContent = dt.group_name;
        tr.querySelector('.disc').textContent = dt.disc;
        tr.querySelector('.disc_name').textContent = dt.disc_name;

        tbody.appendChild(tr);
    });
}
function removeTR () {
    document.querySelectorAll('tbody tr').forEach(function (tr) {
        tr.remove();
    });
}
function submitUser (e) {
    hideAlert ();
    hideSuccessAlert ();

    var button = e.target;
    var id = parseInt(button.dataset.id);
    var tr = e.target;

    while (tr.tagName != 'TR') {
        tr = tr.parentElement;
    }

    var groupName = tr.querySelector('input').value.trim();

    $.ajax({
        url: './lib/admin_edit_group_name.php',
        data: {
            id: id,
            groupName: groupName
        },
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            showSuccessAlert ();
        },
        error: function (error) {
            showAlert();
        }
    });
}
