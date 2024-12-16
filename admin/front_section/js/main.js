//=========================== SIGN OUT LOADING PAGE ===========================//
let logOut = document.querySelector('span.logOut');
logOut.onclick = () => window.sessionStorage.setItem('logOut', 'active');
//=========================== SIGN OUT LOADING PAGE ===========================//
//=====DROPDOWN MENU FOR TRANSLATION=====//
let con = document.querySelector('.block-1 .langs');
let btn = document.querySelector('.block-1 .langs span');

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
//===========================[LOADING PAGE]===========================//
let loading = document.querySelector('.loading');
let signIn  = document.querySelector('.loading .sign-in');

if(window.sessionStorage.getItem('signIn') == 'active') {
    document.body.style.overflow = 'hidden';
    loading.style.display = 'block';
    setTimeout(() => {
        loading.style.opactiy = '0';
        setTimeout(() => loading.style.display = 'none', 4500);
    }, 4000);
    window.sessionStorage.setItem('signIn', 'notActive');
    window.sessionStorage.setItem('mainPage', 'notActive');
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

let selecting = document.querySelectorAll('.dashboard .side ul li');
let deleting = document.querySelector('.confirm');
let sCat = document.getElementById('selecting');
let chBox1 = document.getElementById('main-category');
let chBox2 = document.getElementById('sub-category');
let formPara = document.querySelector('td input.ready-only');

selecting.forEach((s) => {
    s.addEventListener('click', function() {
    selecting.forEach((m) => m.classList.remove('active'))
    s.classList.add('active');
    });
});

// Delete function for All pages
// deleting.onclick = function del() {
//     return confirm('Are you Sure ?');
// }

// chBox1.onclick = function() {if(sCat.disabled == false) {sCat.disabled = true}}
// chBox2.onclick = function() {if(sCat.disabled == true) {sCat.disabled = false}}

// // form a paragraph
// formPara.forEach((s)=> {
//     s.addEventListener('click', function(){
//         s.classList.add('on-ready');
//     })
// })
//===========================[MAIN MENU FOR PHONE]===========================//
let phoneMenu = document.getElementById('phone-menu');
let menuUl = document.querySelector('.navbar-phone ul');
phoneMenu.addEventListener('click', menu);
function menu() {
    if (menuUl.dataset.menu == 'closed') {
        menuUl.dataset.menu = 'opened';
        menuUl.style.display = 'block';
        menuUl.style.opacity = 1;
        menuUl.style.animationName = 'openMenu';
        menuUl.style.animationDuration = '0.5s';
        menuUl.style.animationFillMode = 'forwards';
    } else if (menuUl.dataset.menu == 'opened') {
        menuUl.dataset.menu = 'closed';
        menuUl.style.opacity = 0;
        setTimeout(() => {
            menuUl.style.display = 0;
        }, 1100);
    }
}
// ===========================[MAIN MENU FOR PHONE]===========================//
