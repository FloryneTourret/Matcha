function like_user(id_user, id_user_liked) {
    const req = new XMLHttpRequest();
    req.open('GET', '/index.php/Profile?user_like=' + id_user + '&user_liked=' + id_user_liked, true);
    req.send(null);
    if (document.getElementById('button_like').value == 'like')
    {
        document.getElementById('button_like').classList.remove('btn-outline-primary')
        document.getElementById('button_like').classList.add('btn-outline-secondary')
        document.getElementById('button_like').innerHTML = '<i class="fas fa-heart-broken"></i>'
        document.getElementById('button_like').value = 'unlike'
        if (document.getElementById('liked').textContent == 'Vous like !')
            document.getElementById('liked').innerHTML = 'C\'est un match !'
            
    }
    else
    {
        document.getElementById('button_like').classList.remove('btn-outline-secondary')
        document.getElementById('button_like').classList.add('btn-outline-primary')
        document.getElementById('button_like').innerHTML = '<i class="fas fa-heart"></i>'
        document.getElementById('button_like').value = 'like'
        if (document.getElementById('liked').textContent == 'C\'est un match !')
            document.getElementById('liked').innerHTML = 'Vous like !'
    }

}