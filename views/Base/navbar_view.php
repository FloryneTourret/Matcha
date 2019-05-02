<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/index.php">Matcha</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><ion-icon name="menu"></ion-icon></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

		  <li class="nav-item">
	        <a class="nav-link" href="#">Lien 1</a>
	      </li>
    </ul>
    <?php if (isset($_SESSION['user'])){?>
		<ul class="navbar-nav ml-auto notification" id="notif-icon" style="padding-right: 10px!important;">
	      <li class="nav-item dropdown" id="notif-content">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <i class="far fa-bell"></i>
	        </a>
	        <div class="dropdown-menu dropdown-menu-right content-notif" aria-labelledby="navbarDropdown">
					<p class="dropdown-item">Aucune notification.</p>
	        </div>
			</li>
    </ul>
    <?php } ?>
	  <ul class="navbar-nav ml-auto" style="margin-left: 0!important; margin-right: 20px;">
	 
    <?php if (isset($_SESSION['user'])){?>
	      <li class="nav-item dropdown"></li>
	        <a class="nav-link dropdown-toggle nav-login" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if (!empty($_SESSION['user']['path_profile_picture'])){?>
                <div style='float:left; background-image: url("/<?php echo $_SESSION['user']['path_profile_picture']?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 28px; width: 28px; margin-right:10px;'>
            <?php }else{ ?>
                <div style='float:left; background-image: url("/assets/img/avatar.png"); background-size: cover; border-radius: 100%; background-position: 50% 50%; height: 28px; width: 28px; margin-right:10px;'>
            <?php } ?>
            </div>
            <span><?php echo $_SESSION['user']['login'];?></span></a>
          
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="margin-right: 20px;">
            <a class="dropdown-item" href="/index.php/Profile/<?php echo $_SESSION['user']['login'];?>">Voir mon profil</a>
            <a class="dropdown-item" href="/index.php/Account">Gérer mon profil</a>
            <?php if ($_SESSION['user']['admin'] == 1){?>
              <a class="dropdown-item" href="/index.php/Admin">Panel administrateur</a>
            <?php } ?>
            <div class="dropdown-divider"></div>
	          <a class="dropdown-item" href="/index.php/Logout">Déconnexion</a>
	        </div>
        </li>
        
    <?php } else {?>
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