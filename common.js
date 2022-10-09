function login() {
    var id = document.querySelector('#id');
    var pw = document.querySelector('#pw');

    if(id.value == "" || pw.value == "") {
        alert("로그인을 할 수 없습니다.")
    }
    else {
        location.href = 'main.html';
    }
}

function back() {
    history.go(-1);
}

function create_id() {
    var id = document.querySelector('#id');
    var pw = document.querySelector('#pw');
    var r_pw = document.querySelector('#r_pw');

    if(id.value == "" || pw.value == "" || r_pw.value == "") {
        alert("회원가입을 할 수 없습니다.")
    }
    else {
        if(pw.value !== r_pw.value) {
            alert("비밀번호를 확인해주세요.")
        }
        else {
            location.href = 'login.html';
        }
    }
}

function emailSend() {
    let clientEmail = document.querySelector('#email').value;
    let emailYN = isEmail(clientEmail);

    console.log('입력 이메일' + clientEmail);

    if(emailYN == TRUE) {
        alert("이메일 형식입니다.");

        $.ajax({
            type:"POST",
            url:"/api/member/email",
            data:{userEmail:clientEmail},
            success : function(data){
            },error : function(e){
                alert("오류입니다. 잠시 후 다시 시도해주세요.");
            }
        });
    }else {
        alert("이메일 형식에 알맞게 입력해주세요.");
    }
}   

function isEmail(asValue) {
    var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;
    return regExp.test(asValue);
}

@PostMapping("/member/email")
private int sendEmail(HttpServletRequest, String userEmail) {
    HttpSession session = request.getSession();
    mailService.mailSend(session, userEmail);
    return 123;
}
