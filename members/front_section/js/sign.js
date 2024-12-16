//================================= SIGN IN =================================//
let userIn      = document.querySelector('button.in');
userIn.onclick  = () => window.sessionStorage.setItem('signIn', 'active');
//================================= SIGN IN =================================//
//================================= SIGN UP =================================//
let userName        = document.querySelector('button.ex');
userName.onclick    = () => window.sessionStorage.setItem('signUp', 'active');
//================================= SIGN UP =================================//
//================================= ENABLE REGISTRATION KEY =================================//
let checkAdmin  = document.querySelector('.sign .check-admin');
let adminKey    = document.querySelector('.sign .admin-key');

checkAdmin.addEventListener('click', function() {
    if (checkAdmin.hasAttribute('checked')) {
        checkAdmin.removeAttribute('checked');
        adminKey.setAttribute('name', 'dis-key');
        adminKey.setAttribute('disabled', 'disabled');
    } else {
        checkAdmin.setAttribute('checked', 'checked');
        adminKey.setAttribute('name', 'en-key');
        adminKey.removeAttribute('disabled');
    }
});
//================================= ENABLE REGISTRATION KEY =================================//
//================================= SWITCHING SIGN IN/UP =================================//
let signUp = document.querySelector('.form-signin .sign-up');
let signIn = document.querySelector('.form-signin .sign-in');
let switching1 = document.getElementById('signUp');
let switching2 = document.getElementById('signIn');

switching1.addEventListener('click', function() {
    signIn.style.animation = 'to-other .5s ease-in-out 0s normal forwards';
    setTimeout(() => signIn.style.display = 'none',500);
    setTimeout(() => {
        signUp.style.display = 'block';
        signUp.style.animation = 'from-other .5s ease-in-out 0s normal forwards';
    }, 500);
});
switching2.addEventListener('click', function() {
    signUp.style.animation = 'to-other .5s ease-in-out 0s normal forwards';
    setTimeout(() => signUp.style.display = 'none',500);
    setTimeout(() => {
        signIn.style.display = 'block';
        signIn.style.animation = 'from-other .5s ease-in-out 0s normal forwards';
    }, 500);
});
//================================= SWITCHING SIGN IN/UP =================================//
//=====DROPDOWN MENU FOR RESUME=====//
let con = document.querySelector('.sign .langs');
let btn = document.querySelector('.sign .langs span');

btn.addEventListener('click', function slideDown() {
    if (btn.getAttribute('data-plog') == 'hide') {
        btn.style.transform = 'rotate(180deg)';
        btn.setAttribute('data-plog', 'show');
        con.style.animation = 'langDown .5s forwards';
    } else {
        btn.style.transform = 'rotate(0)';
        btn.setAttribute('data-plog', 'hide');
        con.style.animation = 'langUp .4s forwards ease-in';
    }
});
//=====DROPDOWN MENU FOR RESUME=====//
//================================= CHECK PASSWORD =================================//
let checkInfo   = document.querySelector('.php-check');
let para        = document.querySelector('.php-check p');
let checkButton = document.querySelector('.php-check .php-button');
let switching3  = document.querySelector('.options .ex');

if (para.innerHTML == '') {
    checkInfo.style.opacity = '0';
    setTimeout(() => checkInfo.style.display = 'none', 100);
} else {
    checkInfo.style.display = 'block';
    setTimeout(() => checkInfo.style.opacity = '1', 300);
}
checkButton.onclick = function() {
    checkInfo.style.opacity = '0';
    setTimeout(() => checkInfo.style.display = 'none', 500);
    signIn.style.animation = 'to-other .5s ease-in-out 0s normal forwards';
    setTimeout(() => signIn.style.display = 'none',500);
    setTimeout(() => {
        signUp.style.display = 'block';
        signUp.style.animation = 'from-other .5s ease-in-out 0s normal forwards';
    }, 500);
}
//================================= CHECK PASSWORD =================================//

