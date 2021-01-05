window.addEventListener('DOMContentLoaded', function () {
    clickLoginBtn ();
    clickSignInBtn ();
    clicktestBtn ();
});
// 로그인 버튼 클릭시 로그인 창으로 이동
function clickLoginBtn () {
    document.getElementById('login-btn').addEventListener('click', function () {
        location.href = 'login.php';
    });
}
// 회원 가입 버튼 클릭시 회원 가입 창으로 이동
function clickSignInBtn () {
    document.getElementById('sign-in-btn').addEventListener('click', function () {
        location.href = 'sign-in.php';
    })
}
// 검사하러가기 버튼 클릭시 검사 창으로 이동
function clicktestBtn () {
    document.getElementById('goto-test').addEventListener('click', function () {
        location.href = 'test.php';
    })
}
