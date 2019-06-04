<?php if (isset($_SESSION['user']['user_id'])) { ?>

    <script>
        var interval;
        interval = setInterval(refresh_notif, 5000)
        var click = 0;

        function refresh_notif() {
             $("#notif-content").load("/index.php/Accueil #content-notif");
        }
        function read() {
            if(document.getElementById('content-dropdown-notif').classList.contains('show') == false)
            {
                $.ajax('/index.php/Profile?read=notifs')
                clearInterval(interval)
            }
            else{
                refresh_notif()
                interval = setInterval(refresh_notif, 5000)
            }
        }
    </script>

<?php } ?>

</body>

</html>