//================================= UNKNOWN PROCESS =================================//
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

// form a paragraph
// formPara.forEach((s)=> {
//     s.addEventListener('click', function(){
//         s.classList.add('on-ready');
//     })
// })
//================================= UNKNOWN PROCESS =================================//