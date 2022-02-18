function change_pseudo() { //afichage onglet modification pseudo
    let form = document.getElementById("change_pseudo");
    let change_pic = document.getElementById("change_pic");
    let change_mail = document.getElementById("change_mail");
    let change_mdp = document.getElementById("change_mdp");
    let delete_account = document.getElementById("delete_account");
    if(form.className == 'invisible'){
        change_pic.className = 'invisible';
        change_mail.className = 'invisible';
        change_mdp.className = 'invisible';
        delete_account.className = 'invisible';
        form.className = 'visible';
    }
    else {
        form.className = 'invisible';
    }
}

function change_pic() { //afichage onglet modification image de profil
    let form = document.getElementById("change_pic");
    let change_pseudo = document.getElementById("change_pseudo");
    let change_mail = document.getElementById("change_mail");
    let change_mdp = document.getElementById("change_mdp");
    let delete_account = document.getElementById("delete_account");
    if(form.className == 'invisible'){
        change_pseudo.className = 'invisible';
        change_mail.className = 'invisible';
        change_mdp.className = 'invisible';
        delete_account.className = 'invisible';
        form.className = 'visible';
    }
    else {
        form.className = 'invisible';
    }
}

function change_mail() { //afichage onglet modification e-mail
    let form = document.getElementById("change_mail");
    let change_pic = document.getElementById("change_pic");
    let change_pseudo = document.getElementById("change_pseudo");
    let change_mdp = document.getElementById("change_mdp");
    let delete_account = document.getElementById("delete_account");
    if(form.className == 'invisible'){
        change_pic.className = 'invisible';
        change_pseudo.className = 'invisible';
        change_mdp.className = 'invisible';
        delete_account.className = 'invisible';
        form.className = 'visible';
    }
    else {
        form.className = 'invisible';
    }
}

function change_mdp() { //afichage onglet modification mot de passe
    let form = document.getElementById("change_mdp");
    let change_pic = document.getElementById("change_pic");
    let change_pseudo = document.getElementById("change_pseudo");
    let change_mail = document.getElementById("change_mail");
    let delete_account = document.getElementById("delete_account");
    if(form.className == 'invisible'){
        change_pic.className = 'invisible';
        change_pseudo.className = 'invisible';
        change_mail.className = 'invisible';
        delete_account.className = 'invisible';
        form.className = 'visible';
    }
    else {
        form.className = 'invisible';
    }
}

function delete_account() { //afichage onglet supression compte
    let form = document.getElementById("delete_account");
    let change_pic = document.getElementById("change_pic");
    let change_pseudo = document.getElementById("change_pseudo");
    let change_mail = document.getElementById("change_mail");
    let change_mdp = document.getElementById("change_mdp");
    if(form.className == 'invisible'){
        change_pic.className = 'invisible';
        change_pseudo.className = 'invisible';
        change_mail.className = 'invisible';
        change_mdp.className = 'invisible';
        form.className = 'visible';
    }
    else {
        form.className = 'invisible';
    }
}