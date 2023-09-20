console.log('script profil ok');
let toast=document.getElementById("toast-screen");
let word="rien";
toast.innerHTML=word;

function displayToast($message){
    toast.innerHTML=$message;
    toast.style.display = "block";
    setTimeout(() => {
        toast.style.display = "none";
    }, "3000");
}

function reload(){
    window.location.replace('../index.php')
}



let connectForm = document.getElementById('form-connexion');

if (connectForm){
    connectForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = '../Controller/traitement-connexion.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    console.log("request",request);
    let responseData = await response.json();
    console.log(responseData);
    if (responseData==='{"success":true}'){
        console.log("Vous êtes connecté");
        $message="Vous êtes connecté";
        displayToast($message);
        setTimeout(function(){reload()}, 1500);

    }
    if (responseData==='{"success":false}'){
        console.log("Vous n'êtes pas connecté !")
    }
    });
    
}