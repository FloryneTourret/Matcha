document.getElementById('admin').style.display = "none";
document.getElementById('display_admin').classList.remove("active");
document.getElementById('users').style.display = "block";
document.getElementById('display_users').classList.add("active");
document.getElementById('loading').style.display = "none";
document.getElementById('create').style.display = "none";
document.getElementById('display_create').classList.remove("active");
document.getElementById('report').style.display = "none";
document.getElementById('display_report').classList.remove("active");

function display_admin(){
    document.getElementById('admin').style.display = "block";
    document.getElementById('display_admin').classList.add("active");
    document.getElementById('users').style.display = "none";
    document.getElementById('display_users').classList.remove("active");
    document.getElementById('create').style.display = "none";
    document.getElementById('display_create').classList.remove("active");
    document.getElementById('report').style.display = "none";
    document.getElementById('display_report').classList.remove("active");
    
}

function display_users(){
    document.getElementById('admin').style.display = "none";
    document.getElementById('display_admin').classList.remove("active");
    document.getElementById('users').style.display = "block";
    document.getElementById('display_users').classList.add("active");
    document.getElementById('create').style.display = "none";
    document.getElementById('display_create').classList.remove("active");
    document.getElementById('report').style.display = "none";
    document.getElementById('display_report').classList.remove("active");
    
}

function display_create() {
    document.getElementById('admin').style.display = "none";
    document.getElementById('display_admin').classList.remove("active");
    document.getElementById('users').style.display = "none";
    document.getElementById('display_users').classList.remove("active");
    document.getElementById('create').style.display = "block";
    document.getElementById('display_create').classList.add("active");
    document.getElementById('report').style.display = "none";
    document.getElementById('display_report').classList.remove("active");
}

function display_report() {
    document.getElementById('admin').style.display = "none";
    document.getElementById('display_admin').classList.remove("active");
    document.getElementById('users').style.display = "none";
    document.getElementById('display_users').classList.remove("active");
    document.getElementById('create').style.display = "none";
    document.getElementById('display_create').classList.remove("active");
    document.getElementById('report').style.display = "block";
    document.getElementById('display_report').classList.add("active");
}

function ban(id, enabled, admin){
    
    if ( confirm( "Bannir l'utilisateur ?" ) ) {
        const req = new XMLHttpRequest();
        req.open('GET', '/index.php/Admin?ban=' + id, true); 
        req.send(null);

        document.getElementById('name_'+id).classList.remove("text-primary");
        document.getElementById('name_'+id).classList.remove("text-danger");
        document.getElementById('name_'+id).classList.remove("text-warning");
        document.getElementById('name_'+id).classList.remove("text-dark");
        if(document.getElementById('name_report_'+id) != null){
            document.getElementById('name_report_'+id).classList.remove("text-primary");
            document.getElementById('name_report_'+id).classList.remove("text-danger");
            document.getElementById('name_report_'+id).classList.remove("text-warning");
            document.getElementById('name_report_'+id).classList.remove("text-dark");
        }
        
        document.getElementById('name_'+id).classList.add("text-danger");
        document.getElementById('button_'+id).innerHTML = '<button class="btn btn-sm btn-warning" onclick="unban(\''+ id +'\' , \''+ enabled +'\' , \''+ admin +'\')">Autoriser l\'utilisateur</button>';
        if(document.getElementById('name_report_'+id) != null){
            document.getElementById('name_report_'+id).classList.add("text-danger");
            document.getElementById('button_report_'+id).innerHTML = '<button class="btn btn-sm btn-warning" onclick="unban(\''+ id +'\' , \''+ enabled +'\' , \''+ admin +'\')">Autoriser l\'utilisateur</button>';
            }
        }
}

function unban(id, enabled, admin){
    
    if ( confirm( "Autoriser l'utilisateur ?" ) ) {
        const req = new XMLHttpRequest();
        req.open('GET', '/index.php/Admin?unban=' + id, true); 
        req.send(null);
        document.getElementById('name_'+id).classList.remove("text-danger");
        if(admin == 1)
        {   if(document.getElementById('name_report_'+id) != null)
                document.getElementById('name_report_'+id).classList.add("text-primary");
            document.getElementById('name_'+id).classList.add("text-primary");
        }
        else if (enabled == -1)
        {
            if(document.getElementById('name_report_'+id) != null)
                document.getElementById('name_report_'+id).classList.add("text-dark");
            document.getElementById('name_'+id).classList.add("text-dark");
        }
        else if (enabled == 0){
            if(document.getElementById('name_report_'+id) != null)
                document.getElementById('name_report_'+id).classList.add("text-warning");
            document.getElementById('name_'+id).classList.add("text-warning");
        }
        else if (enabled == 1)
        {
            if(document.getElementById('name_report_'+id) != null)
                document.getElementById('name_report_'+id).classList.add("text-dark");
            document.getElementById('name_'+id).classList.add("text-dark");
        }
        document.getElementById('button_'+id).innerHTML = '<button class="btn btn-sm btn-danger" onclick="ban(\''+ id +'\' , \''+ enabled +'\' , \''+ admin +'\')">Bannir l\'utilisateur</button>';
        if(document.getElementById('name_report_'+id) != null)
            document.getElementById('button_report_'+id).innerHTML = '<button class="btn btn-sm btn-danger" onclick="ban(\''+ id +'\' , \''+ enabled +'\' , \''+ admin +'\')">Bannir l\'utilisateur</button>';
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