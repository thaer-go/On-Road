//=========================== LOADING PAGE ===========================//
let guidContainer   = document.querySelector('.guid-page');
let guidPage        = document.querySelectorAll('.guid-page .content');
let guidNav         = document.querySelectorAll('.custom-nav .nav-item');
let newGuidNav      = Array.from(guidNav);
let navOptions      = document.querySelectorAll('.custom-nav ul li');
let newGuidNav2     = Array.from(navOptions);
let guidClick1      = document.querySelector('.guid-page span.back');
let guidClick2      = document.querySelector('.guid-page span.next');
let finish          = document.querySelector('.guid-page span.next ');
let loading         = document.querySelector('.loading');
let heading1        = document.querySelector('.loading .onRoad');
let heading2        = document.querySelector('.loading .logOut');
let guidCounter     = 0;

window.onload = function (){
    if(window.sessionStorage.getItem('mainPage') == 'active') {
        false;
    } else {
        loading.style.display = 'block';
        document.body.style.overflow = 'hidden';
        setTimeout(() => {
            loading.style.opactiy = '0';
            document.body.style.overflow = 'block';
            setTimeout(() => loading.style.display = 'none', 4500);
        }, 4000);
        if (window.sessionStorage.getItem('logOut') == 'active') {
            document.body.style.overflow = 'scroll';
        } else {
            document.body.style.overflow = 'hidden';
            setTimeout(() => {
                guidContainer.style.display = 'block';
                setTimeout(() => {guidContainer.style.opacity = '1'}, 200);
                guidPage.forEach((e)=> e.style.opacity = '0');
                guidPage[guidCounter].style.opacity = '1';
                guidPage[guidCounter].style.zIndex = '10';
                guidNav[0].style.backgroundColor = '#ff3150';
            }, 8000);
        }
    }
}
//=========================== LOADING PAGE ===========================//
//=========================== GUID PAGE ===========================//
guidClick2.addEventListener('click', nextPag);
function nextPag() {
    if (guidCounter <= guidPage.length) {
        guidCounter++;
        guidLine()
    } else {false}
}

guidClick1.addEventListener('click', prevPage);
function prevPage() {
    if (guidCounter <= 0) {
        false;
    } else {
        guidCounter--;
        guidLine()
    }
}

function guidLine() {
    if (guidCounter == guidPage.length) {
        guidContainer.style.opacity = '0';
        document.body.style.overflow = 'scroll';
        window.sessionStorage.setItem('mainPage', 'active');
        setTimeout(() => {guidContainer.style.display = 'none'}, 1100);
    }
    navOptions.forEach((e)=> e.style.background = 'none');
    guidPage.forEach((e)=> e.style.opacity = '0');
    guidPage[guidCounter].style.opacity = '1';
    if (guidCounter == guidPage.length - 1) {
        guidClick2.innerHTML = 'завершать <i class="fa-solid fa-chevron-right"></i>';
    } else {
        guidClick2.innerHTML = 'Далее <i class="fa-solid fa-chevron-right"></i>';
    }
    if (guidCounter < navOptions.length - 1) {
        if (guidCounter == 3) {
            navOptions[3].style.backgroundColor = 'transparent';
            navOptions[3].style.borderColor = '#ff3150';
            navOptions[3].style.borderRadius = '4px';
        } else {
            navOptions[3].style.borderColor = 'transparent';
            navOptions[guidCounter].style.backgroundColor = '#ff3150';
        }
    }

}
//===========================[GUID PAGE]===========================//
//===========================[CATEGORIES SLIDER]===========================//
// call images from html;
let slideCon = document.querySelector('.slider-container')
let slideImg = document.querySelectorAll('.slider-container .slide');

// call indicators from html;
let prevInd = document.querySelector('.selectors .prev');
let nextInd = document.querySelector('.selectors .next');

// call h6 & span from html;
let imgTitle = document.querySelectorAll('.slider-container .slide h6');
let capTitle = document.querySelectorAll('.slider-container .slide span');
// flexible counter;
let counter = 1;
let moveSlide = 0;
addActiveClass();
//delete & add active class;
function addActiveClass() {
    slideImg.forEach((slide) => slide.classList.remove('active'));
    imgTitle.forEach((img) => img.style.opacity = 0);
    capTitle.forEach((cap) => cap.style.opacity = 0);
    slideImg[counter].classList.add('active');
    imgTitle[counter].style.opacity = 1;
    capTitle[counter].style.opacity = 1;
    if (counter == 0) {
        prevInd.style.opacity = 0;
    } else {
        prevInd.style.opacity = 1;
    }
    if (counter == slideImg.length - 1) {
        nextInd.style.opacity = 0;
    } else {
        nextInd.style.opacity = 1;
    }
}

// event of previous slide;
prevInd.addEventListener('click', prevFun);
function prevFun() {
    counter--;
    addActiveClass();
    moveSlide += 33.333;
    slideCon.style.transform = `translateX(${moveSlide}%)`;
}

// event of previous slide;
nextInd.addEventListener('click', nextFun);
function nextFun() {
    counter++;
    addActiveClass();
    moveSlide -= 33.333;
    slideCon.style.transform = `translateX(${moveSlide}%)`;
}
//===========================[LOADING PAGES]===========================//
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
// ===========================[DROPDOWN MENU FOR LANGAUGES]===========================//
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
// ===========================[DROPDOWN MENU FOR LANGAUGES]===========================//
// ===========================[DROPDOWN MENU FOR LANGAUGES - PHONE]===========================//
let transPhone = document.querySelector('.navbar-phone .trans');
let text = document.querySelector('.navbar-phone .trans a');
transPhone.addEventListener('click', function trans() {
    if (transPhone.getAttribute('data-plog') == 'en') {
        transPhone.setAttribute('data-plog', 'ru');
        text.innerHTML = 'Перевести на (En)';
        text.href = '?lang=Ru';
    } else {
        transPhone.setAttribute('data-plog', 'en');
        text.innerHTML = 'Translate into (RU)';
        text.href = '?lang=En';
    }
});
// ===========================[DROPDOWN MENU FOR LANGAUGES - PHONE]===========================//
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
