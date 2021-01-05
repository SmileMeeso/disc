window.addEventListener('DOMContentLoaded', function () {
    // 카드 초기화
    loadQuestion ();
    // 검사문항 만들기
    document.querySelectorAll('.btn').forEach(function (b) {
        b.addEventListener('click', function (e) { clickBtn (e); });
    })
});
function clickBtn (e) {
    var btn = e.target;
    var score = parseInt(btn.dataset.value);
    var first = _c[0];
    var last = _c[_c.length - 1];
    var current = _d;
    var questionLength = _q.length;
    var now = document.getElementById('now');

    _s[current] = _s[current] + score;

    if (current == last) {
        _i = _i + 1;
        _d = first;
    }
    else {
        _d = _c[_c.indexOf(_d) + 1];
    }

    now.textContent = parseInt(now.textContent) + 1;

    if (_i == questionLength) {
        $.ajax({
            url: './lib/save_result.php',
            type: 'POST',
            dataType: 'JSON',
            data: _s,
            beforeSend: function () {
                disableBtn ();
            },
            success: function () {
                location.href = 'result.php';
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    else {
        nextCard (_i, _d);
    }
}
function nextCard (idx, disc) {
    var title = _q[idx].title;
    var discStr = _q[idx][disc];

    title = title.replace('%string%', discStr);

    document.getElementById('title').textContent = title;
}
function loadQuestion () {
    $.ajax({
        url: './lib/load_question.php',
        type: 'POST',
        dataType: 'JSON',
        data: _s,
        beforeSend: function () {
            disableBtn ();
        },
        success: function (data) {
            _q = data;

            initTotal ();
            nextCard (_i, _d);
            ableBtn ();
        },
        error: function (error) {
            console.log(error);
        }
    });
}
function initTotal () {
    document.getElementById('total').textContent = _q.length * _c.length;
}
function disableBtn () {
    document.querySelectorAll('.btn').forEach(function (b) {
        b.setAttribute('disabled', true);
    });
}
function ableBtn () {
    document.querySelectorAll('.btn').forEach(function (b) {
        b.removeAttribute('disabled');
    });
}
