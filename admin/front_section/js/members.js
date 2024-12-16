//=====CHOOSE ADMIN OR MEMBER=====//
let chooseUser = document.querySelectorAll('.choose-member span');
let allTables = document.querySelectorAll('.tables table');
let rowTable = document.querySelector('.managers');
let rowTable2 = document.querySelector('.members');

chooseUser.forEach((e, i) => {
    e.addEventListener('click', () =>{
        if (e.dataset.manage == 'to change') {
            chooseUser.forEach((d) => d.setAttribute('data-manage', 'to change'));
            allTables.forEach((e) => {
                e.style.opacity = '0';
                setTimeout(() => e.style.display = 'none', 350);
            });
            e.setAttribute('data-manage', 'changed');
            chooseUser.forEach((d) => d.classList.remove('active'));
            e.classList.add('active');
            setTimeout(() => allTables[i].style.display = 'table', 350);
            allTables[i].style.opacity = '1';
        }
    });
})
//=====CHOOSE ADMIN OR MEMBER=====//