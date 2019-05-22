function like_user(id_user, id_user_liked) {
    const req = new XMLHttpRequest();
    req.open('GET', '/index.php/Profile?user_like=' + id_user + '&user_liked=' + id_user_liked, true);
    req.send(null);
    if (document.getElementById('button_like').value == 'like')
    {
        document.getElementById('button_like').innerHTML = '<i class="fas fa-heart"></i> Vous likez'
        document.getElementById('button_like').value = 'unlike'
        document.getElementById('popularite').innerHTML = Number(document.getElementById('popularite').textContent) + +15;
        if (document.getElementById('liked').textContent == 'Vous like !')
            document.getElementById('liked').innerHTML = 'C\'est un match !'
            
    }
    else
    {
        document.getElementById('button_like').innerHTML = '<i class="fas fa-heart"></i> Liker'
        document.getElementById('button_like').value = 'like'
        document.getElementById('popularite').innerHTML = Number(document.getElementById('popularite').textContent) - 15;
        if (document.getElementById('liked').textContent == 'C\'est un match !')
            document.getElementById('liked').innerHTML = 'Vous like !'
    }

}

function report_user(id_user, id_user_reported) {
    const req = new XMLHttpRequest();
    req.open('GET', '/index.php/Profile?user_report=' + id_user + '&user_reported=' + id_user_reported, true);
    req.send(null);
    if (document.getElementById('button_report').value == 'report') {
        document.getElementById('button_report').innerHTML = 'Vous avez signalé l\'utilisateur'
        document.getElementById('button_report').value = 'unreport'

    }
    else {
        document.getElementById('button_report').innerHTML = 'Signaler l\'utilisateur'
        document.getElementById('button_report').value = 'report'
    }
}

function block_user(id_user, id_user_blocked) {
    const req = new XMLHttpRequest();
    req.open('GET', '/index.php/Profile?user_block=' + id_user + '&user_blocked=' + id_user_blocked, true);
    req.send(null);
    if (document.getElementById('button_block').value == 'block') {
        document.getElementById('button_block').innerHTML = 'Vous avez bloqué l\'utilisateur'
        document.getElementById('button_block').value = 'unblock'

    }
    else {
        document.getElementById('button_block').innerHTML = 'Bloquer l\'utilisateur'
        document.getElementById('button_block').value = 'block'
    }
}