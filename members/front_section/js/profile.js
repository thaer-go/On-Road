
//=========================== SIGN OUT LOADING PAGE ===========================//
let logOut      = document.querySelector('span.logOut');
logOut.onclick  = () => window.sessionStorage.setItem('logOut', 'active');
//=========================== SIGN OUT LOADING PAGE ===========================//
//===========================[LOADING PAGE]===========================//
let loading = document.querySelector('.loading');
let signIn  = document.querySelector('.loading .sign-in');
let signUp  = document.querySelector('.loading .sign-up');

if (window.sessionStorage.getItem('signUp') == 'active') {
    window.sessionStorage.setItem('mainPage', 'notActive');
    document.body.style.overflow = 'hidden';
    loading.style.display = 'block';
    signIn.style.display = 'none';
    setTimeout(() => {
        loading.style.opactiy = '0';
        setTimeout(() => loading.style.display = 'none', 4500);
    }, 4000);
    window.sessionStorage.setItem('signUp', 'notActive');
} else if(window.sessionStorage.getItem('signIn') == 'active') {
    window.sessionStorage.setItem('mainPage', 'notActive');
    document.body.style.overflow = 'hidden';
    loading.style.display = 'block';
    signUp.style.display = 'none';
    setTimeout(() => {
        loading.style.opactiy = '0';
        setTimeout(() => loading.style.display = 'none', 4500);
    }, 4000);
    window.sessionStorage.setItem('signIn', 'notActive');
}
//===========================[LOADING PAGE]===========================//
//=====CALENDER MONTH DAYS=====//
let calender = document.querySelector('.section .block-3 .calender .days');
for (let i=1; i < 31; i++) {
    let span = document.createElement('span');
    let text = document.createTextNode(i);
    span.appendChild(text);
    calender.appendChild(span);
}
let calDays = document.querySelectorAll('.section .block-3 .calender .days span');
calDays[2].classList.add('active-span');
calDays.forEach((e) => {
    e.addEventListener('click', function() {
        calDays.forEach((r) => r.classList.remove('active-span'));
        e.classList.add('active-span');
    });
    
});
let month = document.querySelectorAll('.section .block-3 .calender .wm span');
month[1].classList.add('active-span');
month.forEach((e) => {
    e.addEventListener('click', function() {
        month.forEach((r) => r.classList.remove('active-span'));
        e.classList.add('active-span');
    });
    
});
//=====CALENDER MONTH DAYS=====//
//=====DROPDOWN MENU FOR TRANSLATION=====//
let con = document.querySelector('.block-1 .langs');
let btn = document.querySelector('.block-1 .langs span');
console.log(con);
console.log(btn);
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
//=====DROPDOWN MENU FOR TRANSLATION=====//