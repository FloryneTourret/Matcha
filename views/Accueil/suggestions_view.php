<div class="col-md-10 offset-md-1">
  <div class="row">

    <?php foreach ($users as $user) { ?>
      <div class="col-md-3 text-center position-relative" style="background-color: #FFFFFF; border: 1px solid #F4F2F7; padding-bottom: 100px;padding-top: 50px;">
        <?php if (isset($user['match'])) { ?>
            <small class="position-absolute" style="color: #EF6561; margin: 10px; top: 10px; right: 10px;"><?php echo $user['match'] ?>%</small>
        <?php } ?>
        <?php if (!empty($user['path_profile_picture'])) { ?>
          <div style='background-image: url("/<?php echo $user['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px; margin: auto;'></div>
        <?php } else { ?>
          <div style='background-image: url("/assets/img/avatar.png"); background-size: cover; border-radius: 100%; background-position: 50% 50%; height: 80px; width: 80px; margin: auto;'></div>
        <?php }
      $birthDate = $user['user_birthdate'];
      $birthDate = explode("-", $birthDate);
      $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
      ?>
        <p class="lead mt-2 mb-2 text-center"><a href="/index.php/Profile/<?php echo $user['login'] ?>" style="color: #EF6561"><?php echo $user['login'] . ' (' . $age  . 'ans)' ?></a></p>

        <div class="mt-2 mb-2 text-center">
          <?php
          $i = 0;
          if (isset($user['user_tags'][0])) {
            foreach ($user['user_tags'] as $tag) {
              if ($i < 3)
                echo '<small class="badge" style="background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">#' . $tag['tag_name'] . '</small>';
              $i++;
            }
            if (count($user['user_tags']) > 3)
              echo '<small class="badge" style="background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">...</small>';
          } else {
            echo '<small class="badge" style="background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Pas de tags</small>';
          }
          ?>
        </div>

        <div class="mt-4 mb-2 position-absolute text-center" style="bottom: 50px;left: 0;right: 0;">
          <small><?php echo $user['city']; ?> (<?php echo $user['distance']; ?>km)</small>
        </div>

        <div class="mt-2 position-absolute text-center" style="bottom: 10px;left: 0;right: 0;">
          <?php if ($user['liked'] == 0 && $user['like'] == 0) { ?>
            <small style="color: #EF6561; margin: 10px;"><a href="/index.php/Profile/<?php echo $user['login'] ?>" style="color: #EF6561"><i class="fas fa-heart"></i> Liker</a></small>
          <?php } else if ($user['like'] == 1 && $user['liked'] == 1) { ?>
            <small style="color: #EF6561; margin: 10px;"><a href="/index.php/Profile/<?php echo $user['login'] ?>" style="color: #EF6561"><i class="fas fa-heart"></i> Vous matchez</a></small>
          <?php } else if ($user['liked'] == 1 && $user['like'] == 0) { ?>
            <small style="color: #EF6561; margin: 10px;"><a href="/index.php/Profile/<?php echo $user['login'] ?>" style="color: #EF6561"><i class="fas fa-heart"></i> Vous likez</a></small>
          <?php } else { ?>
            <small style="color: #EF6561; margin: 10px;"><a href="/index.php/Profile/<?php echo $user['login'] ?>" style="color: #EF6561"><i class="fas fa-heart"></i> Liker en retour</a></small>
          <?php } ?>
          <small style="color: #EF6561; margin: 10px;"><a href="/index.php/Profile/<?php echo $user['login'] ?>" style="color: #EF6561"><i class="fas fa-fire"></i> <?php echo $user['popularity']; ?> pts</a></small>
        </div>
      </div>
    <?php } ?>
  </div>
</div>