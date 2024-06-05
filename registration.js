document.addEventListener('DOMContentLoaded', function(){
    const form = document.getElementById('form_js'); 

    form.addEventListener('submit', function(event) {
        const giorno = parseInt(document.getElementById('giorno').value, 10);
        const mese = parseInt(document.getElementById('mese').value, 10);
        const anno = parseInt(document.getElementById('anno').value, 10);
    
        const dataCorrente = new Date();
        const annoCorrente = dataCorrente.getFullYear();

        const dataInserita = new Date(anno, mese - 1, giorno); 
        const password = document.getElementById('password').value;
        const lunghezzaMinima = 8;
        const lunghezzaMassima = 16;

        if(anno  > annoCorrente){
            alert("L'anno inserito è oltre l'anno corrente " + annoCorrente);
            event.preventDefault();
            return;
        }

        if (dataInserita > dataCorrente) {
            alert("La data inserita non può essere oltre la data corrente " + dataCorrente);
            event.preventDefault();
            return;
        }

        if (password.length < lunghezzaMinima || password.length > lunghezzaMassima) {
            alert("La password deve essere lunga tra " + lunghezzaMinima + " e " + lunghezzaMassima + " caratteri.");
            event.preventDefault();
            return;
        }

        var uppercaseRegex = /[A-Z]/;
        if (!uppercaseRegex.test(password)) {
            alert("La password deve contenere almeno una lettera maiuscola.");
            event.preventDefault();
            return;
        }

        var specialCharRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
        if (!specialCharRegex.test(password)) {
            alert("La password deve contenere almeno un carattere speciale.");
            event.preventDefault();
            return;
        }
    });
});

let eyeicon = document.getElementById("pass_nascosta");
let password = document.getElementById("password");

eyeicon.onclick = function(){
    if(password.type == 'password'){
        password.type = "text";
        eyeicon.src = "immagini per html/mostra_password.png";
    }else{
        password.type = "password";
        eyeicon.src = "immagini per html/password_nascosta.png";
    }
}

let eyeicon_conf = document.getElementById("pass_nascosta_conf");
let password_conf = document.getElementById("conferma_password");

eyeicon_conf.onclick = function(){
    if(password_conf.type == 'password'){
        password_conf.type = "text";
        eyeicon_conf.src = "immagini per html/mostra_password.png";
    } else {
        password_conf.type = "password";
        eyeicon_conf.src = "immagini per html/password_nascosta.png";
    }
}