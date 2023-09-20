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