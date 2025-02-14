<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/index.php">Matcha</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
      <ion-icon name="menu"></ion-icon>
    </span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if (isset($_SESSION['user'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="/index.php/recherche">Rechercher</a>
      </li> 
    <?php } ?>
    </ul>
    <?php if (isset($_SESSION['user'])) { ?>
      <ul class="navbar-nav ml-auto notification" id="notif-icon" style="padding-right: 10px!important;">
        <li class="nav-item" id="message-content">
        <div id="content-message">
        <?php if(isset($notif_message)) {?>
          <?php if($notif_message == TRUE) {?>
            <a class="nav-link chat" href="/index.php/Chat"><i class="fas fa-comment-alt"></i></a>
          <?php } else {?>
            <a class="nav-link chat" href="/index.php/Chat"><i class="far fa-comment-alt"></i></a>
          <?php } ?>
        <?php } else {?>
          <a class="nav-link chat" href="/index.php/Chat"><i class="far fa-comment-alt"></i></a>
        <?php } ?>
        </div>
        </li>
        <li class="nav-item dropdown" id="notif-content">
          <div id="content-notif">
            <a class="nav-link dropdown-toggle" onclick="read()" id="notifs" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if (isset($notifs[0]['lu'])) { ?>
              <?php if ($notifs[0]['lu'] == 0) { ?>
                <i class="fas fa-bell" id="icon_notif"></i>
              <?php } else { ?>
                <i class="far fa-bell" id="icon_notif"></i>
              <?php } ?>
            <?php } else { ?>
              <i class="far fa-bell" id="icon_notif"></i>
            <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right content-notif" aria-labelledby="notifs" id="content-dropdown-notif">
              <?php if (isset($notifs[0]['content_notif'])) { ?>
                <?php foreach ($notifs as $notif) { ?>
                  <p class="dropdown-item"><?php echo $notif['login'] . ' ' . $notif['content_notif']; ?></p>
                <?php } ?>
              <?php } else { ?>
                <p class="dropdown-item">Aucune notification.</p>
              <?php } ?>
            </div>
          </div>
        </li>
      </ul>
    <?php } ?>
    <ul class="navbar-nav ml-auto" style="margin-left: 0!important; margin-right: 20px;">

      <?php if (isset($_SESSION['user'])) { ?>
        <li class="nav-item dropdown"></li>
        <a class="nav-link dropdown-toggle nav-login" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php if (!empty($_SESSION['user']['path_profile_picture'])) { ?>
            <div style='float:left; background-image: url("/<?php echo $_SESSION['user']['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 28px; width: 28px; margin-right:10px;'>
            <?php } else { ?>
              <div style='float:left; background-image: url("/assets/img/avatar.png"); background-size: cover; border-radius: 100%; background-position: 50% 50%; height: 28px; width: 28px; margin-right:10px;'>
              <?php } ?>
            </div>
            <span><?php echo $_SESSION['user']['login']; ?></span></a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="margin-right: 20px;">
          <a class="dropdown-item" href="/index.php/Profile/<?php echo $_SESSION['user']['login']; ?>">Voir mon profil</a>
          <a class="dropdown-item" href="/index.php/Account">Gérer mon profil</a>
          <?php if ($_SESSION['user']['admin'] == 1) { ?>
            <a class="dropdown-item" href="/index.php/Admin">Panel administrateur</a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/index.php/Logout">Déconnexion</a>
        </div>
        </li>

      <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="/index.php/Login">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php/Register">Inscription</a>
        </li>
      <?php } ?>

    </ul>
  </div>
</nav>
<div class="content-page">