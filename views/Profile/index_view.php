<div class="row info_profile">
  <div class="col-md-3">
    <figure class="img_user">
      <?php if (!empty($user['path_profile_picture'])) { ?>
        <div class="picture_profile" style='background-image: url("/<?php echo $user['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 128px; width: 128px;'>
        <?php } else { ?>
          <div class="picture_profile" style='background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 128px; width: 128px;'>
          <?php } ?>
        </div>
    </figure>

  </div>
  <div class="col-md-6">
    <h1 class="user_login">
      <?php if ($user['user_gender_id'] == 1) echo '<i class="fas fa-mars"></i> ';
      else if ($user['user_gender_id'] == 2) echo '<i class="fas fa-venus"></i> ';
      else if ($user['user_gender_id'] == 3) echo '<i class="fas fa-mercury"></i> ';
      echo $user['login'] ?>
      <?php if (isset($user['city'])) echo '<small>(' . $user['city'] . ')</small>'; ?>
      <?php if ($user['login'] == $_SESSION['user']['login']) echo '<a href="/index.php/Account" class="settings_user"><i class="fas fa-cog"></i></a>'; ?>
      <?php if ($user['login'] != $_SESSION['user']['login']) { ?>
        <?php if ($user['count_pictures'] > 0 && $_SESSION['user']['count_pictures'] > 0) { ?>
          <?php if ($like == FALSE) { ?>
            <button class="btn btn-sm btn-outline-dark ml-5" id="button_like" onclick="like_user(<?php echo $_SESSION['user']['user_id'] ?>, <?php echo $user['user_id'] ?>)" value="like"><i class="fas fa-heart"></i> Liker</button>
          <?php } else { ?>
            <button class="btn btn-sm btn-outline-dark ml-5" id="button_like" onclick="like_user(<?php echo $_SESSION['user']['user_id'] ?>, <?php echo $user['user_id'] ?>)" value="unlike"><i class="fas fa-heart"></i> Vous likez</button>
          <?php } ?>
        <?php } ?>
        <button data-toggle="modal" data-target="#report_blacklist" class="btn btn-sm btn-outline-light ml-5 font-weight-bold" style="color: #000">...</button>
      <?php } ?>
    </h1>
    <h2 style="color: #EF6461" class="font-italic lead">
      <?php
      if ($liked == TRUE && $like == FALSE) {
        echo '<span id="liked">Vous like !</span>';
      } else if ($liked == TRUE && $like == TRUE) {
        echo '<span id="liked">C\'est un match !</span>';
      } else
        echo '<span id="liked"></span>';
      ?>
    </h2>

    <small class="font-italic">
      <?php
      if (-(strtotime($user['last_connexion']) - time() + 7200) < 300) {
        echo '<span class="dot online" style="color: green;"><i class="fas fa-circle"></i></span> En ligne';
      } else {
        echo '<span class="dot offline" style="color: red;"><i class="fas fa-circle"></i></span> Hors ligne. Dernière connexion : <span class="timestamp">' . $user['last_connexion'] . '</span>';
      }
      ?>
    </small>

    <p>
      <?php echo $user['firstname'] . ' ' . $user['lastname'] . ', ';
      $birthDate = $user['user_birthdate'];
      $birthDate = explode("-", $birthDate);
      $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
        ? ((date("Y") - $birthDate[0]) - 1)
        : (date("Y") - $birthDate[0]));
      echo $age . ' ans';
      ?></p>
    <p>Orientation sexuelle : <i><?php echo $user['orientation_name'] ?></i></p>
    <?php if (!empty($user['biography'])) { ?>
      <p class="is-italic"><?php echo $user['biography'] ?></p>
    <?php } ?>
    <p>
      <i class="fas fa-tags"></i>
      <?php
      if (empty($user_tags))
        echo 'Pas encore de tag.';
      else {
        foreach ($user_tags as $tag)
          echo '<span style="color: #EF6461"> #' . $tag['tag_name'] . '</span>';
      }
      ?>
    </p>
  </div>
  <div clas="col-md-2">
    <p class="lead" style="color: #EF6461"><i class=" fas fa-fire"></i> <span id="popularite"><?php echo $user['popularity']; ?></span> pts</p>
  </div>
</div>
<div class="row">
  <div class="col-md-10 offset-md-1 content_profile">
    <?php if ($user['login'] ==  $_SESSION['user']['login']) { ?>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-images"></i> Mes photos</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="far fa-eye"></i> Les vues de mon profil</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="fas fa-heart"></i> Personnes qui m'ont liké</a>
          <a class="nav-item nav-link" id="nav-likes-tab" data-toggle="tab" href="#nav-likes" role="tab" aria-controls="nav-likes" aria-selected="false"><i class="fas fa-grin-hearts"></i> Personnes que je like</a>
          <a class="nav-item nav-link" id="nav-blacklist-tab" data-toggle="tab" href="#nav-blacklist" role="tab" aria-controls="nav-blackist" aria-selected="false"><i class="fas fa-book-dead"></i> Ma blacklist</a>
        </div>
      </nav>
    <?php } ?>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <?php
        $count_pictures = count($pictures);
        $i = 0;
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
          <ol class="carousel-indicators">
            <?php foreach ($pictures as $picture) { ?>
              <?php if ($i == 0) { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <?php } else { ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
              <?php }
            $i++;
          } ?>
          </ol>
          <?php $i = 0; ?>
          <div class="carousel-inner">
            <?php foreach ($pictures as $picture) { ?>
              <?php if ($i == 0) { ?>
                <div class="carousel-item active">
                  <img class="d-block profile_pictures" src="/<?php echo $picture['picture_path'] ?>" alt="Picture profile">
                </div>
              <?php } else { ?>
                <div class="carousel-item">
                  <img class="d-block profile_pictures" src="/<?php echo $picture['picture_path'] ?>" alt="Picture profile">
                </div>
              <?php }
            $i++;
          } ?>
          </div>
          <?php if (count($pictures) > 0) { ?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          <?php } else { ?>
            <p>Aucune photo actuellement.</p>
          <?php } ?>
        </div>
      </div>

      <?php if ($user['login'] ==  $_SESSION['user']['login']) { ?>
        <div class="tab-pane fade table-responsive" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <?php
          $total_views = 0;

          foreach ($views as $view)
            $total_views++;
          ?>
          <p class="font-italic mt-5" style="color: #EF6461"> Total de vues: <?php echo $total_views; ?></p>
          <table class="table table-striped table-hover mt-5">
            <tbody>
              <?php foreach ($views as $view) { ?>
                <tr>
                  <td>
                    <?php if (!empty($view['path_profile_picture'])) { ?>
                      <div style='background-image: url("/<?php echo $view['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                      <?php } else { ?>
                        <div style='background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                        <?php } ?>
                  </td>
                  <td>
                    <a class="lead" style="color: #EF6461" href="/index.php/Profile/<?php echo $view['login'] ?>"><?php echo $view['login'] ?></a>
                  </td>
                  <td>
                    <p class="timestamp"><?php echo $view['view_date'] ?></p>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-outline-secondary" href="/index.php/Profile/<?php echo $view['login'] ?>">Voir le profil</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="tab-pane fade table-responsive" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          <?php
          $total_likes = 0;

          foreach ($likes as $like)
            $total_likes++;
          ?>
          <p class="font-italic mt-5" style="color: #EF6461"> Total de personnes qui me like: <?php echo $total_likes; ?></p>
          <table class="table table-striped table-hover mt-5">
            <tbody>
              <?php foreach ($likes as $like) { ?>
                <tr>
                  <td>
                    <?php if (!empty($like['path_profile_picture'])) { ?>
                      <div style='background-image: url("/<?php echo $like['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                      <?php } else { ?>
                        <div style='background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                        <?php } ?>
                  </td>
                  <td>
                    <a class="lead" style="color: #EF6461" href="/index.php/Profile/<?php echo $like['login'] ?>"><?php echo $like['login'] ?></a>
                  </td>
                  <td>
                    <?php if (in_array($like, $mylikes)) { ?>
                      <p style="color: #5D576B"><i class="far fa-heart"></i> Vous avez un match !</p>
                    <?php } ?>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-outline-secondary" href="/index.php/Profile/<?php echo $like['login'] ?>">Voir le profil</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="tab-pane fade table-responsive" id="nav-likes" role="tabpanel" aria-labelledby="nav-likes-tab">
          <?php
          $total_mylikes = 0;

          foreach ($mylikes as $like)
            $total_mylikes++;
          ?>
          <p class="font-italic mt-5" style="color: #EF6461"> Total de personnes que je like: <?php echo $total_mylikes; ?></p>
          <table class="table table-striped table-hover mt-5">
            <tbody>
              <?php foreach ($mylikes as $like) { ?>
                <tr>
                  <td>
                    <?php if (!empty($like['path_profile_picture'])) { ?>
                      <div style='background-image: url("/<?php echo $like['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                      <?php } else { ?>
                        <div style='background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                        <?php } ?>
                  </td>
                  <td>
                    <a class="lead" style="color: #EF6461" href="/index.php/Profile/<?php echo $like['login'] ?>"><?php echo $like['login'] ?></a>
                  </td>
                  <td>
                    <?php if (in_array($like, $likes)) { ?>
                      <p style="color: #5D576B"><i class="far fa-heart"></i> Vous avez un match !</p>
                    <?php } ?>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-outline-secondary" href="/index.php/Profile/<?php echo $like['login'] ?>">Voir le profil</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="tab-pane fade table-responsive" id="nav-blacklist" role="tabpanel" aria-labelledby="nav-blacklist-tab">
          <?php
          $total_blacklist = 0;

          foreach ($blacklist as $user)
            $total_blacklist++;
          ?>
          <p class="font-italic mt-5" style="color: #EF6461"> Total de personnes que j'ai bloqué: <?php echo $total_blacklist; ?></p>
          <table class="table table-striped table-hover mt-5">
            <tbody>
              <?php foreach ($blacklist as $user) { ?>
                <tr>
                  <td>
                    <?php if (!empty($user['path_profile_picture'])) { ?>
                      <div style='background-image: url("/<?php echo $user['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                      <?php } else { ?>
                        <div style='background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 80px; width: 80px;'>
                        <?php } ?>
                  </td>
                  <td>
                    <a class="lead" style="color: #EF6461" href="/index.php/Profile/<?php echo $user['login'] ?>"><?php echo $user['login'] ?></a>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-outline-secondary" href="/index.php/Profile/<?php echo $like['login'] ?>">Voir le profil</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      <?php } ?>
    </div>
  </div>
</div>


<div class="modal fade" id="report_blacklist" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <?php if ($report == FALSE) { ?>
          <button class="btn btn-sm btn-outline-warning mt-4" id="button_report" onclick="report_user(<?php echo $_SESSION['user']['user_id'] ?>, <?php echo $user['user_id'] ?>)" value="report">Signaler l'utilisateur</button>
        <?php } else { ?>
          <button class="btn btn-sm btn-outline-warning mt-4" id="button_report" onclick="report_user(<?php echo $_SESSION['user']['user_id'] ?>, <?php echo $user['user_id'] ?>)" value="unreport">Vous avez signalé l'utilisateur</button>
        <?php } ?>
        <br>
        <?php if ($block == FALSE) { ?>
          <button class="btn btn-sm btn-outline-danger mt-4 mb-4" id="button_block" onclick="block_user(<?php echo $_SESSION['user']['user_id'] ?>, <?php echo $user['user_id'] ?>)" value="block">Bloquer l'utilisateur</button>
        <?php } else { ?>
          <button class="btn btn-sm btn-outline-danger mt-4 mb-4" id="button_block" onclick="block_user(<?php echo $_SESSION['user']['user_id'] ?>, <?php echo $user['user_id'] ?>)" value="unblock">Vous avez bloqué l'utilisateur</button>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="/assets/js/timestamp.js"></script>
<script src="/assets/js/profile.js"></script>