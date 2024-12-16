//=====DROPDOWN MENU FOR RESUME=====//
let btns        = document.querySelectorAll('.resume .title');
let icons       = document.querySelectorAll('.resume .icon');
let contents    = document.querySelectorAll('.resume .content');
let paras       = document.querySelectorAll('.resume .para');

btns.forEach((e, i) => e.addEventListener('click', function slideDown() {
    if (icons[i].getAttribute('data-plog') == 'hide') {
        icons[i].style.transform = 'rotate(180deg)';
        icons[i].setAttribute('data-plog', 'show');
        contents[i].style.animation = 'slideDown .5s forwards';
        btns[i].style.border = '1px solid var(--yellow-color)';
        btns[i].style.color = 'var(--yellow-color)';
        paras[i].style.display = 'block';
        paras[i].style.animation = 'para .5s forwards ease-in .3s';
    } else {
        icons[i].style.transform = 'rotate(0)';
        icons[i].setAttribute('data-plog', 'hide');
        paras[i].style.animation = 'para2 .2s forwards';
        setTimeout(() => paras[i].style.display = 'none', 300);
        contents[i].style.animation = 'slideUp .4s forwards ease-in';
        btns[i].style.border = '1px solid #dfdfdf';
        btns[i].style.color = '#777';
    }
}));
//=====DROPDOWN MENU FOR RESUME=====//
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
//=====DROPDOWN MENU FOR RESUME=====//
let con = document.querySelector('.custom-nav .langs');
let btn = document.querySelector('.custom-nav .langs span');
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
// ===========================[FILLED SCOLLED SPAN]===========================//
let filledSpan = document.querySelector('.filled-span');
let myBtn = document.querySelector('.mybtn');

window.onscroll = function() {
    filledSpan.style.width = `${(window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100}%`;

    if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
        myBtn.style.opacity = 1;
        myBtn.style.transform = "rotateY(180deg)";
    } else {
        myBtn.style.opacity = 0;
        myBtn.style.transform = "rotateY(-180deg)";
    }
}

myBtn.onclick = function() {
    myBtn.style.transform = "rotateY(-180deg)";
    document.documentElement.scrollTop = 0;
}
// ===========================[FILLED SCOLLED SPAN]===========================//