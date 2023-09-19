console.log("responsiv js ok");
let navEl = document.querySelector('nav');
let navCloseIconButton = document.querySelector('nav > button[role="icon-button"]');

let navButtons = document.querySelectorAll('nav > button');
let navBalises = document.querySelectorAll('nav > li');
let displayMenu = document.getElementById("menuButton");

displayMenu.addEventListener('click', (event) => {
    if (window.matchMedia("(max-width: 460px)").matches) {
        console.log("click displayMenu");
        navEl.hidden = false;
    }
});

navEl.addEventListener('click',() => {
    if (window.matchMedia("(max-width: 460px)").matches) {
        console.log("click nav");
        navEl.hidden = true;
    }
})

for (let navButton of navButtons) {
    navButton.addEventListener('click', (event) => {
        if (window.matchMedia("(max-width: 460px)").matches) {
            navEl.hidden = true;
        }
    
    });
}

for (let navLi of navBalises) {
    navLi.addEventListener('click', (event) => {
        if (window.matchMedia("(max-width: 460px)").matches) {
            navEl.hidden = true;
        }
    
    });
}

navCloseIconButton.addEventListener('click', (event) => {
    if (window.matchMedia("(max-width: 460px)").matches) {
        navEl.hidden = true;
    }
});



menuButton.addEventListener('click', (event) => {
    if (window.matchMedia("(max-width: 460px)").matches) {
        navEl.hidden = false;
    } 
});

window.addEventListener('resize', navReappear);

function navReappear(){
    if (window.matchMedia("(min-width: 460px)").matches) {
        console.log("nav nav");
        navEl.hidden = false;
    }
}