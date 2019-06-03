<?php if (isset($_SESSION['user']['user_id'])) { ?>

    <script>
        setInterval(refresh_notif, 5000)

        function refresh_notif() {
            console.log('test')
            $("#notifications").load("/index.php/Accueil#content-notif");
        }

        function read() {
            console.log('read')
            $.ajax('/index.php/Profile?read=notifs').done(function() {
                $("#notifications").load("/index.php/Accueil#content-notif");
            });
        }
    </script>

<?php } ?>

</body>

</html>