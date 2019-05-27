<?php if (!isset($_SESSION['user']['login'])) { ?>

  <h1>Page d'accueil</h1>

<?php } else { ?>

  <h1>Suggestions</h1>
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
    var_dump($_SESSION['user']['user_tags']);
    ?>

    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="col-md-3 text-center pt-4 pb-4" style="background-color: #FFFFFF; border: 1px solid #F4F2F7">
          <?php if (!empty($_SESSION['user']['path_profile_picture'])) { ?>
            <div style='background-image: url("/<?php echo $_SESSION['user']['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px; margin: auto;'></div>
          <?php } else { ?>
            <div style='background-image: url("/assets/img/avatar.png"); background-size: cover; border-radius: 100%; background-position: 50% 50%; height: 80px; width: 80px; margin: auto;'></div>
          <?php } ?>

          <p class="lead mt-2 mb-2"><a href="/index.php/Profile/<?php echo $_SESSION['user']['login'] ?>" style="color: #EF6561"><?php echo $_SESSION['user']['login'] ?></a></p>

          <div>
            <?php
            $i = 0;
            foreach ($_SESSION['user']['user_tags'] as $tag) {
              if ($i < 3)
                echo '<small class="badge" style="background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">#' . $tag['tag_name'] . '</small>';
              $i++;
            }
            if (count($_SESSION['user']['user_tags']) > 3)
              echo '<small class="badge" style="background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">...</small>';
            ?>
          </div>
        </div>
      </div>
    </div>
    <p>Liste des suggestions</p>
  <?php } ?>


<?php } ?>