console.log("Drag ok");

//________________________________UPDATE____________________________________


async function fetchUpdateTask(idUpdate, valueUpdate){
    //let response =  await fetch("../Controller/traitement-deleteTask.php?deleteTask=${idDelete}")
    let url = `../Controller/traitement-updateTask.php?updateTask=${idUpdate}&valueUpdate=${valueUpdate}`;
    let request = new Request(url, {
        method: 'GET',
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.text();
    //gettask();
   // draggable()
  }
  

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
        let newState = e.target.id;
        let idDiv = draggable.id;
        console.log(newState);
        console.log("drag "+draggable.id);
        fetchUpdateTask(idDiv, newState);

    }
}

//____________________________call bdd tasks________________________________

async function gettask(){
    
    const response = await fetch("../Controller/traitement-displaytask.php");
    console.log(response);
    const task = await response.json();
    console.log(task);

    let afaire=document.getElementById("afaire");
    let encours=document.getElementById("encours");
    let fait=document.getElementById("fait");
    let jsonL = Object.keys(task).length;

    afaire.innerHTML="";
    
    for (let i=0; i < jsonL; i++){
        if((task[i]['state'])==="encours"){
            text="<div class='item' id='"+task[i]['id']+"' draggable='true'><details><summary>"+ task[i]['title']+"</summary>"+ task[i]['def']+"</details></div>";
            encours.insertAdjacentHTML('afterbegin', text);            
        }else if((task[i]['state'])==="afaire"){
            text="<div class='item' id='"+task[i]['id']+"' draggable='true'><details><summary>"+ task[i]['title']+"</summary>"+ task[i]['def']+"</details></div>";
            afaire.insertAdjacentHTML('afterbegin', text);            
        }else if((task[i]['state'])==="fait"){
            text="<div class='item' id='"+task[i]['id']+"' draggable='true'><details><summary>"+ task[i]['title']+"</summary>"+ task[i]['def']+"</details></div>";
            fait.insertAdjacentHTML('afterbegin', text);            
        }

    }
    draggable();
}


//_______________________________________UPDATE TASK__________________________________


/*
    function updateTask(){
        let allUpdate=document.querySelectorAll('.item');
        console.log("allUpdate: "+allUpdate.length);
        for (const Up of allUpdate){
            console.log("a");
            Up.addEventListener("change", (e) =>{
            //e.preventDefault();
                let idUpdate = e.target.id;
                let valueUpdate = e.target.value;
                console.log(idUpdate);
                fetchUpdateTask(idUpdate, valueUpdate);
            })
        }
    }
*/




gettask();
draggable();