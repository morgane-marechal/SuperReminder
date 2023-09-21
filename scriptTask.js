let taskform = document.getElementById('formtask'); //declarer un element du DOM sous forme de variable

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
    let responseData = await response.json();
    });
}


//aller chercher toutes les taches

async function gettask(){
    const response = await fetch("../Controller/traitement-displaytask.php");
    console.log(response);
    const task = await response.json();
    console.log(task);
    console.log(task[0]);
    console.log(task[0]['def']);
    let display=document.getElementById("display-task");
    //display.innerHTML=task[0]['def'];
    let jsonL = Object.keys(task).length;
    console.log(jsonL);
    for (let i=0; i < jsonL; i++){
        display.innerHTML += "<p>"+ task[i]['title']+" "+task[i]['def']+" "+task[i]['state']+'</p>';
    }
    }

gettask();
