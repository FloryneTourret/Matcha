<?php if (!isset($_SESSION['user']['login'])) { ?>

  <h1>Page d'accueil</h1>

<?php } else { ?>

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

    <h1 class="text-center mt-4 mb-5" style="color:#0A1128">Ces personnes pourraient vous plaire</h1>

    <div class="form-inline text-center col-md-10 offset-md-1 filters">
      <div class="input-group mb-4 mr-sm-4">
        <input type="number" class="form-control" id="age_min" placeholder="Age minimum">
      </div>

      <div class="input-group mb-4 mr-sm-4">
        <input type="number" class="form-control" id="age_max" placeholder="Age maximum">
      </div>

      <div class="input-group mb-4 mr-sm-4">
        <input type="text" class="form-control" id="city" placeholder="Ville">
      </div>

      <div class="input-group mb-4 mr-sm-4">
        <input type="number" class="form-control" id="distance" placeholder="km autour de moi">
      </div>

      <div class="input-group mb-4 mr-sm-4">
        <input type="number" class="form-control" id="pop_min" placeholder="Popularité minimum">
      </div>

      <div class="input-group mb-4 mr-sm-4">
        <input type="number" class="form-control" id="pop_max" placeholder="Popularité maximum">
      </div>

      <div class="input-group mb-4 mr-sm-4" style="min-width: 30vw;">
        <select id="tags" name="tags[]" class="selectpicker form-control" multiple>
          <?php
          foreach ($tags as $tag)
            echo '<option>' . $tag['tag_name'] . '</option>';
          ?>
        </select>
      </div>

      <button onclick="sort()" class="btn btn-primary mb-4" style="background-color: #EF6461; color: black; border: none">Filtrer</button>
    </div>

    <div class="text-center mb-4">
      <small onclick="sort()" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Match <i class=" fas fa-sort-down"></i></small>
      <small onclick="sort('distance')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Distance <i class=" fas fa-sort-down"></i></small>
      <small onclick="sort('age')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Age <i class=" fas fa-sort-down"></i></small>
      <small onclick="sort('popularite')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Popularité <i class=" fas fa-sort-down"></i></small>
      <small onclick="sort('tags')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Tags en commun <i class=" fas fa-sort-down"></i></small>
    </div>
    <div id="suggestions"></div>

  <?php } ?>


<?php } ?>

<script>
  function sort(type = 'match') {
    age_min = document.getElementById('age_min').value;
    if (age_min == '')
      age_min = 'none';
    age_max = document.getElementById('age_max').value;
    if (age_max == '')
      age_max = 'none';

    city = document.getElementById('city').value;
    if (city == '')
      city = 'none';

    distance = document.getElementById('distance').value;
    if (distance == '')
      distance = 'none';

    pop_min = document.getElementById('pop_min').value;
    if (pop_min == '')
      pop_min = 'none';
    pop_max = document.getElementById('pop_max').value;
    if (pop_max == '')
      pop_max = 'none';
    tags = getSelectValues(document.getElementById('tags'));
    tags_user = JSON.stringify(tags)
    if (tags_user == '[]')
      tags_user = "none";

    $("#suggestions").load("/index.php/Accueil/sort/" + type + '?age_min=' + age_min + '&age_max=' + age_max + '&city=' + city + '&distance=' + distance + '&pop_min=' + pop_min + '&pop_max=' + pop_max + '&tags=' + tags_user);
  }

  function getSelectValues(select) {
    var result = [];
    var options = select && select.options;
    var opt;

    for (var i = 0, iLen = options.length; i < iLen; i++) {
      opt = options[i];

      if (opt.selected) {
        result.push(opt.value || opt.text);
      }
    }
    return result;
  }
</script>
<?php if (isset($_SESSION['user']['login']) && !(empty($_SESSION['user']['firstname']) || empty($_SESSION['user']['lastname']) || empty($_SESSION['user']['user_birthdate'])
  || empty($_SESSION['user']['user_gender_id']) || empty($_SESSION['user']['user_orientation_id'])
  || empty($_SESSION['user']['login'])  || empty($_SESSION['user']['email']) || empty($_SESSION['user']['biography'])
  || empty($_SESSION['user']['path_profile_picture']) || empty($_SESSION['user']['longitude']) || empty($_SESSION['user']['latitude'])
  || empty($_SESSION['user']['address'])  || empty($_SESSION['user']['city'])  || empty($_SESSION['user']['country'])
  || $_SESSION['user']['count_pictures'] <= 0  || count($_SESSION['user']['user_tags']) <= 0)) { ?>

<script>
  sort();
</script>

<?php } ?>
