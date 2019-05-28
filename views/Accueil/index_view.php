<?php if (!isset($_SESSION['user']['login'])) { ?>

  <h1>Page d'accueil</h1>

<?php } else { ?>

  <h1 class="text-center mt-4 mb-5" style="color:#0A1128">Ces personnes pourraient vous plaire</h1>
  <?php

  if (
    empty($_SESSION['user']['firstname']) || empty($_SESSION['user']['lastname']) || empty($_SESSION['user']['user_birthdate'])
    || empty($_SESSION['user']['user_gender_id']) || empty($_SESSION['user']['user_orientation_id'])
    || empty($_SESSION['user']['login'])  || empty($_SESSION['user']['email']) || empty($_SESSION['user']['biography'])
    || empty($_SESSION['user']['path_profile_picture']) || empty($_SESSION['user']['longitude']) || empty($_SESSION['user']['latitude'])
    || empty($_SESSION['user']['address'])  || empty($_SESSION['user']['city'])  || empty($_SESSION['user']['country'])
    || $_SESSION['user']['count_pictures'] <= 0  || count($_SESSION['user']['user_tags']) <= 0
  ) {
    echo '<p>Veuillez remplir votre profil étendu pour accèder aux suggestions</p>';
  } else {
    ?>

    <div class="col-md-10 offset-md-1">
      <div class="row">

        <?php foreach ($users as $user) { ?>
          <div class="col-md-3 text-center pt-4 position-relative" style="background-color: #FFFFFF; border: 1px solid #F4F2F7; padding-bottom: 100px;">
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
            <p class="lead mt-2 mb-2"><a href="/index.php/Profile/<?php echo $user['login'] ?>" style="color: #EF6561"><?php echo $user['login'] . ' (' . $age  . 'ans)' ?></a></p>

            <div class="mt-2 mb-2">
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

            <div class="mt-4 mb-2 position-absolute" style="bottom: 50px;left: 0;right: 0;">
              <small><?php echo $user['city']; ?></small>
            </div>

            <div class="mt-2 position-absolute" style="bottom: 10px;left: 0;right: 0;">
              <small style="color: #EF6561; margin: 10px;"><i class="fas fa-heart"></i> Liker</small>
              <small style="color: #EF6561; margin: 10px;"><i class="fas fa-fire"></i> <?php echo $user['popularity']; ?> pts</small>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  <?php } ?>


<?php } ?>