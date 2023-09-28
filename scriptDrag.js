console.log("Drag ok");


//________________________________dragable_____________________________________

function draggable(){
    //const item = document.querySelector('.item');
    const items = document.querySelectorAll('.item');

    // attach the dragstart event handler

    items.forEach(item => {
        item.addEventListener('dragstart', dragStart);
    });

    //item.addEventListener('dragstart', dragStart);

    // handle the dragstart

    function dragStart(e) {
    console.log('drag starts...');
    e.dataTransfer.setData('text/plain', e.target.id);
    console.log(e.target.id)
    setTimeout(() => {
            e.target.classList.add('hide');
        }, 0);
    }

    const boxes = document.querySelectorAll('.box');

    boxes.forEach(box => {
        box.addEventListener('dragenter', dragEnter)
        box.addEventListener('dragover', dragOver);
        box.addEventListener('dragleave', dragLeave);
        box.addEventListener('drop', drop);
    });

    function dragEnter(e) {
        e.preventDefault();
        e.target.classList.add('drag-over');
    }

    function dragOver(e) {
        e.preventDefault();
        e.target.classList.add('drag-over');
    }

    function dragLeave(e) {
        e.target.classList.remove('drag-over');
        
    }


    function drop(e) {
        e.target.classList.remove('drag-over');

        // get the draggable element
        const id = e.dataTransfer.getData('text/plain');
        const draggable = document.getElementById(id);

        // add it to the drop target
        e.target.appendChild(draggable);

        // display the draggable element
        draggable.classList.remove('hide');
        console.log(e.target.id);
    }
}

//____________________________call bdd tasks________________________________

async function gettask(){
    
    const response = await fetch("../Controller/traitement-displaytask.php");
    console.log(response);
    const task = await response.json();
    console.log(task);
    // console.log(task[0]);
    // console.log(task[0]['def']);
    //console.log(jsonL);
    /*
    let display=document.getElementById("display-task");
    let tableHeader = "<table id='displayTask'><tr> <th></th><th></th><th></th></tr></table>";

    display.innerHTML+=tableHeader;
    let jsonL = Object.keys(task).length;
    //display.insertAdjacentHTML("afterbegin", tableHeader);
    let displayTable=document.getElementById("displayTask");
    //displayTable.insertAdjacentHTML('beforeend', text);
 */
    let afaire=document.getElementById("afaire");
    let jsonL = Object.keys(task).length;

    afaire.innerHTML="";
    for (let i=0; i < jsonL; i++){
        text="<div class='item' id='item1"+ task[i]['id']+"' draggable='true'>"+ task[i]['title']+"</div>";
       afaire.insertAdjacentHTML('afterbegin', text);
    }
    draggable();
   


}

gettask();
draggable();