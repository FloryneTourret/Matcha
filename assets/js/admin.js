document.getElementById('admin').style.display = "none";
document.getElementById('display_admin').classList.remove("active");
document.getElementById('users').style.display = "block";
document.getElementById('display_users').classList.add("active");
document.getElementById('create').style.display = "none";
document.getElementById('loading').style.display = "none";
document.getElementById('display_create').classList.remove("active");

function display_admin(){
    document.getElementById('admin').style.display = "block";
    document.getElementById('display_admin').classList.add("active");
    document.getElementById('users').style.display = "none";
    document.getElementById('display_users').classList.remove("active");
    document.getElementById('create').style.display = "none";
    document.getElementById('display_create').classList.remove("active");
    
}

function display_users(){
    document.getElementById('admin').style.display = "none";
    document.getElementById('display_admin').classList.remove("active");
    document.getElementById('users').style.display = "block";
    document.getElementById('display_users').classList.add("active");
    document.getElementById('create').style.display = "none";
    document.getElementById('display_create').classList.remove("active");
    
}

function display_create() {
    document.getElementById('admin').style.display = "none";
    document.getElementById('display_admin').classList.remove("active");
    document.getElementById('users').style.display = "none";
    document.getElementById('display_users').classList.remove("active");
    document.getElementById('create').style.display = "block";
    document.getElementById('display_create').classList.add("active");

}

function ban(id, enabled, admin){
    
    if ( confirm( "Bannir l'utilisateur ?" ) ) {
        const req = new XMLHttpRequest();
        req.open('GET', '/index.php/Admin?ban=' + id, true); 
        req.send(null);

        document.getElementById('name_'+id).classList.remove("has-text-primary");
        document.getElementById('name_'+id).classList.remove("has-text-danger");
        document.getElementById('name_'+id).classList.remove("has-text-warning");
        document.getElementById('name_'+id).classList.remove("has-text-grey-dark");
        
        document.getElementById('name_'+id).classList.add("has-text-danger");
        document.getElementById('button_'+id).innerHTML = '<button class="btn btn-sm btn-warning" onclick="unban(\''+ id +'\' , \''+ enabled +'\' , \''+ admin +'\')">Autoriser l\'utilisateur</button>';
    }
}

function unban(id, enabled, admin){
    
    if ( confirm( "Autoriser l'utilisateur ?" ) ) {
        const req = new XMLHttpRequest();
        req.open('GET', '/index.php/Admin?unban=' + id, true); 
        req.send(null);
        document.getElementById('name_'+id).classList.remove("has-text-danger");
        if(admin == 1)
            document.getElementById('name_'+id).classList.add("has-text-primary");
        else if (enabled == -1)
            document.getElementById('name_'+id).classList.add("has-text-grey-dark");
        else if (enabled == 0)
            document.getElementById('name_'+id).classList.add("has-text-warning");
        else if (enabled == 1)
            document.getElementById('name_'+id).classList.add("has-text-grey-dark");
            document.getElementById('button_'+id).innerHTML = '<button class="btn btn-sm btn-danger" onclick="ban(\''+ id +'\' , \''+ enabled +'\' , \''+ admin +'\')">Bannir l\'utilisateur</button>';
    }
}
document.getElementById("create_users").addEventListener("submit", function (event) {
    event.preventDefault()
    create_users(document.getElementById("nb_users").value)
});

function create_users(nb) {
    document.getElementById('loading').style.display = "block";
    document.getElementById('create_users').style.display = "none";
    const req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('loading').style.display = "none";
            document.getElementById('create_users').style.display = "block";
        }
    };
    req.open('GET', "/index.php/Admin?nb_users=" + nb, true);
    req.send(null);
}