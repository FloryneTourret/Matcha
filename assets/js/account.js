document.getElementById('profile').style.display = "block";
document.getElementById('display_profile').classList.add("active");
document.getElementById('picture').style.display = "none";
document.getElementById('display_picture').classList.remove("active");
document.getElementById('password').style.display = "none";
document.getElementById('display_password').classList.remove("active");
document.getElementById('notif').style.display = "none";
document.getElementById('display_notif').classList.remove("active");
document.getElementById('delete').style.display = "none";
document.getElementById('display_delete').classList.remove("active");

function display_profile(){
    document.getElementById('profile').style.display = "block";
    document.getElementById('display_profile').classList.add("active");
    document.getElementById('picture').style.display = "none";
    document.getElementById('display_picture').classList.remove("active"); 
    document.getElementById('password').style.display = "none";
    document.getElementById('display_password').classList.remove("active");
    document.getElementById('notif').style.display = "none";
    document.getElementById('display_notif').classList.remove("active");
    document.getElementById('delete').style.display = "none";
    document.getElementById('display_delete').classList.remove("active");
    
}

function display_picture(){
    document.getElementById('profile').style.display = "none";
    document.getElementById('display_profile').classList.remove("active");
    document.getElementById('picture').style.display = "block";
    document.getElementById('display_picture').classList.add("active"); 
    document.getElementById('password').style.display = "none";
    document.getElementById('display_password').classList.remove("active");
    document.getElementById('notif').style.display = "none";
    document.getElementById('display_notif').classList.remove("active");
    document.getElementById('delete').style.display = "none";
    document.getElementById('display_delete').classList.remove("active");
    
}

function display_password(){
    document.getElementById('profile').style.display = "none";
    document.getElementById('display_profile').classList.remove("active");
    document.getElementById('picture').style.display = "none";
    document.getElementById('display_picture').classList.remove("active");
    document.getElementById('password').style.display = "block";
    document.getElementById('display_password').classList.add("active");
    document.getElementById('notif').style.display = "none";
    document.getElementById('display_notif').classList.remove("active");
    document.getElementById('delete').style.display = "none";
    document.getElementById('display_delete').classList.remove("active");
    
}

function display_notif(){
    document.getElementById('profile').style.display = "none";
    document.getElementById('display_profile').classList.remove("active");
    document.getElementById('picture').style.display = "none";
    document.getElementById('display_picture').classList.remove("active");
    document.getElementById('password').style.display = "none";
    document.getElementById('display_password').classList.remove("active");
    document.getElementById('notif').style.display = "block";
    document.getElementById('display_notif').classList.add("active");
    document.getElementById('delete').style.display = "none";
    document.getElementById('display_delete').classList.remove("active");
    
}

function display_delete(){
    document.getElementById('profile').style.display = "none";
    document.getElementById('display_profile').classList.remove("active");
    document.getElementById('picture').style.display = "none";
    document.getElementById('display_picture').classList.remove("active");
    document.getElementById('password').style.display = "none";
    document.getElementById('display_password').classList.remove("active");
    document.getElementById('notif').style.display = "none";
    document.getElementById('display_notif').classList.remove("active");
    document.getElementById('delete').style.display = "block";
    document.getElementById('display_delete').classList.add("active");
}
function account_delete(id){
    if ( confirm( "Êtes vous absolument sur de vouloir supprimer votre compte?" ) ) {
        const req = new XMLHttpRequest();
        req.open('GET', '/index.php/Account?delete=' + id, true); 
        req.send(null);
        window.location.replace("/index.php/Logout");
    }
}

function basename(path) {
    return path.replace(/\\/g,'/').replace( /.*\//, '' );
}
function name_input(){
    document.getElementById('file_output').innerHTML = (basename(document.getElementById('file_upload').value));
}