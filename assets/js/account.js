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

function picture_profile(id_picture){
    $('.pictures_list_img').each(function(index, el){
        el.style.opacity = ".5";
    });
    document.getElementById('picture_' + id_picture).style.opacity = "1"
}

function delete_picture(id){
    if ( confirm( "Supprimer cette photo ? Cette action est irreversible." ) ) {
        const req = new XMLHttpRequest();
        req.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {  
                document.location.reload()
            }
            };
        req.open('GET', '/index.php/Account?delete_picture=' + id, true); 
        req.send(null);
    }
}

function change_profile_picture(){
    $('.pictures_list_img').each(function(index, el){
        if (el.style.opacity == "1")
        {
            const req = new XMLHttpRequest();
            req.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {  
                    document.location.reload();
                }
                };
            req.open('GET', "/index.php/Account?profile_picture=" + el.id.substr(8), true); 
            req.send(null);
        }
    });
    
}

  
$("#file_upload").change(function() {

    var output = document.getElementById('image-preview');
    if(event.target.files[0] != undefined)
        output.src = URL.createObjectURL(event.target.files[0]);
    else
        output.removeAttribute('src')

    if(output.src != "")
    {
        output.style.display = "block";
        $('#image-preview').rcrop('destroy');
        $('#image-preview').rcrop({
            full : false,
            minSize : [100, 100],
            maxSize : [null, null],
            preserveAspectRatio : true,
            inputs : true,
            inputsPrefix : 'crop',
            grid : true,
            });
    }
    else{
        $('#image-preview').rcrop('destroy');
        output.style.display = "none";
    }

});
