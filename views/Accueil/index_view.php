<?php if (!isset($_SESSION['user']['login'])) { ?>

  <h1>Page d'accueil</h1>

<?php } else { ?>

  <h1 class="text-center mt-4 mb-5" style="color:#0A1128">Ces personnes pourraient vous plaire</h1>
  <div class="text-center">
    <small onclick="sort()" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Match <i class=" fas fa-sort-down"></i></small>
    <small onclick="sort('distance')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Distance <i class=" fas fa-sort-down"></i></small>
    <small onclick="sort('age')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Age <i class=" fas fa-sort-down"></i></small>
    <small onclick="sort('popularite')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Popularité <i class=" fas fa-sort-down"></i></small>
    <small onclick="sort('tags')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Tags en commun <i class=" fas fa-sort-down"></i></small>
  </div>
  <p>Fitrer par : </p>
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

    <div id="suggestions"></div>

  <?php } ?>


<?php } ?>

<script>
  function sort(type = 'match') {
    $("#suggestions").load("/index.php/Accueil/suggestions/" + type);
  }
  sort();
</script>