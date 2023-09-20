console.log("script register form OK");
let toast=document.getElementById("toast-screen");
let word="rien";
toast.innerHTML=word;

function displayToast($message){
    toast.innerHTML=$message;
    toast.style.display = "block";
    toast.style.animation = "appear 0.7s";
    setTimeout(() => {
        toast.style.display = "none";
    }, "3000");
}

function reload(){
    window.location.replace('connexion.php')
}


let insForm = document.getElementById('form-register');

if (insForm){
    insForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    let form = new FormData(event.target);
    let url = '../Controller/traitement-inscription.php';
    let request = new Request(url, {
        method: 'POST',
        body: form
    });
    let response = await fetch(request);
    //console.log("request",request);
    let responseData = await response.json();
    console.log(responseData);
    if (responseData==='{"success":true}'){
        $message = "Nouvel utilisateur enregistré !";
        displayToast($message);
        setTimeout(function(){reload()}, 1500);
    }
    if (responseData==='{"success":false}'){
        console.log("Ce nom d'utilisateur existe déjà !")
        $message = "Ce nom d'utilisateur existe déjà !";
        displayToast($message);
    }

    if (responseData.success==="mauvais format"){
        console.log(responseData.success);
        $message = "Votre mot de passe ne respecte pas les conditions requises !";
        displayToast($message);
    }

    if (responseData.success==="diff MP"){
        console.log(responseData.success);
        $message = "Vos mots de passes ne sont pas identiques";
        displayToast($message);
    }
    });
}