<div class="row info_profile">
    <div class="col-md-3">
        <figure class="img_user">
        <?php if (!empty($user['path_profile_picture'])){?>
            <div class="picture_profile" style='background-image: url("/<?php echo $user['path_profile_picture']?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 128px; width: 128px;'>
        <?php }else{ ?>
          <div class="picture_profile" style='background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 128px; width: 128px;'>
        <?php } ?>
        </div>
        </figure>
    </div>
    <div class="col-md-6">
        <h1 class="user_login"><?php echo $user['login']?><?php if ($user['login'] == $_SESSION['user']['login']) echo '<a href="/index.php/Account" class="settings_user"><i class="fas fa-cog"></i></a>';?></h1>
        <p><?php echo $user['firstname'].' '.$user['lastname'] ?></p>
        <p><?php echo $user['email']?></p>
        <?php if (!empty($user['biography'])){?>
            <p class="is-italic"><?php echo $user['biography']?></p>
        <?php } ?>
    </div>
</div>
<div class="row">
  <div class="col-md-10 offset-md-1 content_profile">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Pictures</a>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Views</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Likes</a>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          Contenu pictures
      </div>

      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          Contenu likes
      </div>

      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          Contenu view
      </div>
    </div>
  </div>
</div>
