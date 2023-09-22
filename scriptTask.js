let taskform = document.getElementById('formtask'); //declarer un element du DOM sous forme de variable


//_______________________________________ADD TASK__________________________________


if (taskform){
    taskform.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = '../Controller/traitement-task.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    console.log("request",request);
    gettask();
    let responseData = await response.json();
    });
}




    //initialise delete on the task


    function deleteTask(){
        let allDel=document.querySelectorAll('.delete');
        console.log("allDel: "+allDel.length);
        for (const del of allDel){
            console.log("a");
            del.addEventListener("click", (e) =>{
             //e.preventDefault();
                let idDelete= e.target.id;
                console.log(idDelete);
                fetchDeleteTask(idDelete);
            })
        }
    }
    
    async function fetchDeleteTask(idDelete){
      //let response =  await fetch("../Controller/traitement-deleteTask.php?deleteTask=${idDelete}")
      let url = `../Controller/traitement-deleteTask.php?deleteTask=${idDelete}`;
      let request = new Request(url, {
          method: 'GET',
      });
      let response = await fetch(request);
      console.log("request",request);
      let responseData = await response.text();
      gettask();
    }


    
    deleteTask();

//_______________________________________UPDATE TASK__________________________________


function updateTask(){
    let allUpdate=document.querySelectorAll('.update');
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

async function fetchUpdateTask(idUpdate, valueUpdate){
    //let response =  await fetch("../Controller/traitement-deleteTask.php?deleteTask=${idDelete}")
    let url = `../Controller/traitement-updateTask.php?updateTask=${idUpdate}&valueUpdate=${valueUpdate}`;
    let request = new Request(url, {
        method: 'GET',
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.text();
    gettask();
  }


// ____________________________________________________________________________________


//aller chercher toutes les taches

async function gettask(){
    
    const response = await fetch("../Controller/traitement-displaytask.php");
    console.log(response);
    const task = await response.json();
    // console.log(task);
    // console.log(task[0]);
    // console.log(task[0]['def']);
    //console.log(jsonL);
    let display=document.getElementById("display-task");
    let tableHeader = "<table id='displayTask'><tr> <th></th><th></th><th></th></tr></table>";

    display.innerHTML+=tableHeader;
    let jsonL = Object.keys(task).length;
    //display.insertAdjacentHTML("afterbegin", tableHeader);
    let displayTable=document.getElementById("displayTask");
    //displayTable.insertAdjacentHTML('beforeend', text);

    displayTable.innerHTML="";
    for (let i=0; i < jsonL; i++){
        text="<tr>"+"<td>"+ task[i]['title']+"</td>"+"<td>"+task[i]['def']+"</td><td>"+
        "<select name='state' id='"+ task[i]['id']+"' class='update'><option value=''>"+task[i]['state']+"</option><option value='à faire'>A faire</option><option value='fait'>Fait</option></select></td>"+
        "<td><button id='"+ task[i]['id']+"' class='delete' >X</button></td></tr>";
       displayTable.insertAdjacentHTML('afterbegin', text);
    }

    deleteTask();
    updateTask();
}


gettask();


