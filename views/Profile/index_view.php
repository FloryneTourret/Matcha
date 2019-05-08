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
        <h1 class="user_login"><?php if($user['user_gender_id'] == 1) echo '<i class="fas fa-mars"></i> '; else if($user['user_gender_id'] == 2) echo '<i class="fas fa-venus"></i> '; else if($user['user_gender_id'] == 3) echo '<i class="fas fa-mercury"></i> '; echo $user['login']?><?php if ($user['login'] == $_SESSION['user']['login']) echo '<a href="/index.php/Account" class="settings_user"><i class="fas fa-cog"></i></a>';?></h1>
        <p>
          <?php echo $user['firstname'].' '.$user['lastname'].', ';
          $birthDate = $user['user_birthdate'];
          $birthDate = explode("-", $birthDate);
          $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));
          echo $age.' ans';
        ?></p>
        <p>Orientation sexuelle : <i><?php echo $user['orientation_name'] ?></i></p>
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
        
        <?php if ($user['login'] ==  $_SESSION['user']['login']) { ?>
        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Views</a>
        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Likes</a>
        <?php } ?>

      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <?php 
        $count_pictures = count($pictures);
        $i = 0;
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
          <ol class="carousel-indicators">
          <?php foreach($pictures as $picture) { ?>
            <?php if($i == 0) {?>
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <?php }else {?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
            <?php }$i++; }?>
          </ol>
          <?php $i = 0;?>
          <div class="carousel-inner">
          <?php foreach($pictures as $picture) { ?>
            <?php if($i == 0) {?>
            <div class="carousel-item active">
              <img class="d-block profile_pictures" src="/<?php echo $picture['picture_path'] ?>" alt="Picture profile">
            </div>
            <?php }else {?>
            <div class="carousel-item">
              <img class="d-block profile_pictures" src="/<?php echo $picture['picture_path'] ?>" alt="Picture profile">
            </div>
          <?php }$i++;} ?>
          </div>
          <?php if (count($pictures) > 0){?>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
          <?php } else{ ?>
            <p>Aucune photo actuellement.</p>
          <?php } ?>
        </div>
      </div>

      <?php if ($user['login'] ==  $_SESSION['user']['login']) { ?>
      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          Contenu views
      </div>

      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          Contenu likes
      </div>
      <?php } ?>
    </div>
  </div>
</div>