<div class="gestion_user">
    <div class="row">
        <div class="col-md-3 offset-md-1">
            <?php if (!empty($error)) { ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php } ?>
            <?php if (!empty($success)) { ?>
                <p class="text-info"><?php echo $success; ?></p>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 offset-md-1">
            <aside class="menu">
                <p class="menu-label">
                    Gestion du compte
                </p>
                <hr>
                <nav class="nav flex-column">
                    <a class="nav-link" onclick="display_picture()" id="display_picture">Gérer mes photos</a>
                    <a class="nav-link active" onclick="display_profile()" id="display_profile">Modifier mon profil</a>
                    <a class="nav-link" onclick="display_password()" id="display_password">Changer mon mot de passe</a>
                    <a class="nav-link" onclick="display_notif()" id="display_notif">Mes notfications</a>
                    <a class="nav-link" onclick="display_delete()" id="display_delete">Supprimer mon compte</a>
                </nav>
            </aside>
        </div>

        <div class="col-md-7">
            <div class="container-changepicture" id="picture">
                <figure class="image is-128x128 img_user">
                    <h2>Ma photo de profil</h2>
                    <?php if (!empty($_SESSION['user']['path_profile_picture'])) { ?>
                        <div data-toggle="modal" data-target="#profile_picture_modal" style='cursor: pointer; background-image: url("/<?php echo $_SESSION['user']['path_profile_picture'] ?>"); background-size: cover; background-position: 50% 50rder-radius: 100%; height: 128px; width: 128px;'>
                        <?php } else { ?>
                            <div data-toggle="modal" data-target="#profile_picture_modal" style='cursor: pointer; background-image: url("/assets/img/avatar.png"); background-size: cover; background-position: 50% 50%; border-radius: 100%; height: 128px; width: 128px;'>
                            <?php } ?>
                        </div>
                </figure>
                <h2 class="title_list_pictures">Mes photos</h2>
                <?php if (count($pictures) >= 5) { ?>
                    <small class="font-italic">Attention, le nombre de photos est limité à 5.</small>
                <?php } ?>

                <div class="list-pictures mt-5">
                    <?php foreach ($pictures as $picture) { ?>
                        <img style="cursor: pointer;" class="col-md-2" src="/<?php echo $picture['picture_path'] ?>" alt="" onclick="delete_picture(<?php echo $picture['picture_id'] ?>)">
                    <?php } ?>
                </div>

                <?php if (count($pictures) < 5) { ?>
                    <form action="/index.php/Account" method="post" enctype="multipart/form-data" class="form_upload" id="upload-form">

                        <img id="image-preview" alt="Upload profile" style="display: none">
                        <div id="wapper-image"></div>

                        <div class="input-group">
                            <div class="custom-file">
                                <input class="custom-file-input" id="file_upload" onchange="name_input()" type="file" name="newimg" id="newimg" accept="image/*">
                                <label class="custom-file-label" id="file_output">Ajouter une photo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Envoyer !</button>
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
            <div class="container-changeprofile" id="profile">
                <form action="/index.php/Account" method="post">

                    <div class="form-group">
                        <label>Prénom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="user_firstname" placeholder="Prénom" required value="<?php echo $_SESSION['user']['firstname']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="user_lastname" placeholder="Nom" required value="<?php echo $_SESSION['user']['lastname']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Date de naissance</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-birthday-cake"></i></div>
                            </div>
                            <?php $date = strtotime(date("Y-m-d") . '-18 year'); ?>
                            <input class="form-control" type="date" name="user_birthdate" required value="<?php if ($_SESSION['user']['user_birthdate'] != NULL) {
                                                                                                                echo $_SESSION['user']['user_birthdate'];
                                                                                                            } else {
                                                                                                                echo date("Y-m-d", $date);
                                                                                                            } ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Genre</label>
                        <div class="input-group mb-2">
                            <select class="form-control" name="user_gender">
                                <option value="1" <?php if ($_SESSION['user']['user_gender_id'] == 1) echo 'selected'; ?>>Homme</option>
                                <option value="2" <?php if ($_SESSION['user']['user_gender_id'] == 2) echo 'selected'; ?>>Femme</option>
                                <option value="3" <?php if ($_SESSION['user']['user_gender_id'] == 3) echo 'selected'; ?>>Non binaire</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Orientation</label>
                        <div class="input-group mb-2">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1" name="user_orientation" value="1" class="custom-control-input" <?php if ($_SESSION['user']['user_orientation_id'] == 1) echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadioInline1">Homme</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2" name="user_orientation" value="2" class="custom-control-input" <?php if ($_SESSION['user']['user_orientation_id'] == 2) echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadioInline2">Femme</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline3" name="user_orientation" value="3" class="custom-control-input" <?php if ($_SESSION['user']['user_orientation_id'] == 3) echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadioInline3">Non binaire</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline4" name="user_orientation" value="4" class="custom-control-input" <?php if ($_SESSION['user']['user_orientation_id'] == 4) echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadioInline4">Bisexuel</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline5" name="user_orientation" value="5" class="custom-control-input" <?php if ($_SESSION['user']['user_orientation_id'] == 5) echo 'checked'; ?>>
                                <label class="custom-control-label" for="customRadioInline5">Tous les genres</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pseudo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input class="form-control" type="text" name="user_pseudo" placeholder="Pseudo" required value="<?php echo $_SESSION['user']['login']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Adresse email</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                            </div>
                            <input class="form-control" type="mail" name="user_mail" placeholder="Adresse email" required value="<?php echo $_SESSION['user']['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Biographie</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-pen-nib"></i></div>
                            </div>
                            <textarea id="quote-content" class="form-control" type="text" name="user_bio" placeholder="Biographie"><?php if (!empty($_SESSION['user']['biography'])) echo $_SESSION['user']['biography']; ?></textarea>
                        </div>
                        <button id="get-another-quote-button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-sync-alt"></i> Flemme ?</button>
                    </div>

                    <div class="form-group">
                        <label>Tags</label>
                        <div class="input-group mb-2">
                            <select class="form-control" id="tags-select" name="user_tags[]" multiple="multiple" style="width: 100%">
                                <?php foreach ($tags as $tag) { ?>
                                    <?php $found = 0; ?>
                                    <?php foreach ($_SESSION['user']['user_tags'] as $user_tag) { ?>
                                        <?php if ($tag['tag_id'] == $user_tag['id_tag']) { ?>
                                            <option value="<?php echo $tag['tag_id']; ?>" selected><?php echo $tag['tag_name']; ?></option>
                                            <?php $found = 1; ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php if ($found == 0) { ?>
                                        <option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>

                        </div>
                    </div>
                    <div>
                        <label>Adresse</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                            </div>
                            <input class="form-control" type="text" id="user_input_autocomplete_address" placeholder="Votre adresse..." value="<?php echo $_SESSION['user']['address']; ?>">
                        </div>
                        <input id="street_number" name="street_number" type="hidden">
                        <input id="route" name="route" type="hidden">
                        <input id="postal_code" name="postal_code" type="hidden">
                        <input id="locality" name="locality" type="hidden">
                        <input id="country" name="country" type="hidden">
                        <input id="latitude" name="latitude" type="hidden">
                        <input id="longitude" name="longitude" type="hidden">
                    </div>

                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token']; ?>">
                    <div class="clearfix">
                        <button class="btn btn-secondary mb-2 float-right" type="submit">Mettre à jour mon profil</button>
                    </div>
                </form>
            </div>


            <div class="container-changepassword" id="password">
                <form action="/index.php/Account" method="post">
                    <div class="form-group">
                        <label class="label">Votre mot de passe actuel</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input class="form-control" type="password" name="user_old_password" placeholder="Votre mot de passe actuel" required value="<?php if (isset($_POST['user_login'])) {
                                                                                                                                                                echo $_POST['user_login'];
                                                                                                                                                            } ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Votre nouveau mot de passe <i class="fas fa-info-circle" data-toggle="modal" data-target="#password_modal"></i></label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input class="form-control" type="password" name="user_password" placeholder="Votre mot de passe" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Répétez votre nouveau mot de passe</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            </div>
                            <input class="form-control" type="password" name="user_password_repeat" placeholder="Votre mot de passe" required>
                        </div>
                    </div>
                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token']; ?>">
                    <div class="clearfix">
                        <button class="btn btn-secondary mb-2 float-right" type="submit">Modifier mon mot de passe</button>
                    </div>
                </form>
            </div>

            <div class="container-changenotif" id="notif">
                <form action="/index.php/Account" method="post">
                    <div class="field">
                        <label class="label">Recevoir des notifications?</label>
                        <label class="switch">
                            <?php if ($_SESSION['user']['notif'] == 0) { ?>
                                <input type="checkbox" name="user_notif">
                            <?php } else { ?>
                                <input type="checkbox" name="user_notif" checked>
                            <?php } ?>
                            <span class="slider round"></span>
                        </label>
                    </div>
                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token']; ?>">
                    <input class="input" name="user_notif_active" type="hidden" value="<?php echo $_SESSION['token']; ?>">
                    <div>
                        <button class="btn btn-secondary mb-2" type="submit">Mettre à jour mes paramètres</button>
                    </div>
                </form>
            </div>

            <div class="container-delete" id="delete">

                <div class="column">
                    <div class="field">
                        <label class="label label-danger">Supprimer mon compte ?</label>
                        <p class="has-text-danger">Attention, cette action est irreversible. Une fois le compte supprimé, toutes les données seront effacées et ne pourront pas être récupérées.</p>
                    </div>
                    <input class="input" name="user_token" type="hidden" value="<?php echo $_SESSION['token']; ?>">
                    <input class="input" name="user_delete" type="hidden" value="<?php echo $_SESSION['token']; ?>">
                    <div>
                        <button class="btn btn-danger mb-2" onclick="account_delete('<?php echo $_SESSION['user']['user_id']; ?>')">Supprimer</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Règles de mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Votre mot de passe contient au moins : </p>
                <ul class="modal_list">
                    <li>12 caractères</li>
                    <li>une majuscule</li>
                    <li>une minuscule</li>
                    <li>un chiffre</li>
                    <li>un caractère spécial</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Compris !</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profile_picture_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Choisir ma photo de profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php if (count($pictures) == 0) {
                        echo '<p class="ml-4">Veuillez uploader une photo avant.</p>';
                    } ?>
                    <?php $i = 0;
                    foreach ($pictures as $picture) { ?>
                        <?php if ($i == 0) { ?>
                            <?php if ($picture['picture_path'] == $_SESSION['user']['path_profile_picture']) { ?>
                                <img class="pictures_list_img offset-md-1 col-md-2" style="height: 100%; width:100%; opacity: 1;" src="/<?php echo $picture['picture_path'] ?>" alt="" id="picture_<?php echo $picture['picture_id'] ?>" onclick="picture_profile(<?php echo $picture['picture_id'] ?>)">
                            <?php } else { ?>
                                <img class="pictures_list_img offset-md-1 col-md-2" style="height: 100%; width:100%; opacity: .5;" src="/<?php echo $picture['picture_path'] ?>" alt="" id="picture_<?php echo $picture['picture_id'] ?>" onclick="picture_profile(<?php echo $picture['picture_id'] ?>)">
                            <?php } ?>
                        <?php } else { ?>
                            <?php if ($picture['picture_path'] == $_SESSION['user']['path_profile_picture']) { ?>
                                <img class="pictures_list_img col-md-2" style="height: 100%; width:100%; opacity: 1;" src="/<?php echo $picture['picture_path'] ?>" alt="" id="picture_<?php echo $picture['picture_id'] ?>" onclick="picture_profile(<?php echo $picture['picture_id'] ?>)">
                            <?php } else { ?>
                                <img class="pictures_list_img col-md-2" style="height: 100%; width:100%; opacity: .5;" src="/<?php echo $picture['picture_path'] ?>" alt="" id="picture_<?php echo $picture['picture_id'] ?>" onclick="picture_profile(<?php echo $picture['picture_id'] ?>)">
                            <?php } ?>
                        <?php }
                    $i++;
                } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="change_profile_picture();">Changer !</button>
            </div>
        </div>
    </div>
</div>


<script src="/assets/js/account.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCFUDkSZ_ocdopTHNoZiZeq7Uq8T8ARhM4"></script>
<script>
    $('#get-another-quote-button').on('click', function(e) {
        e.preventDefault();
        document.getElementById('quote-content').value = '';
        $.ajax({
            url: 'http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]=1',
            success: function(data) {
                var post = data.shift();
                var quote = post.content.substring(3, post.content.length - 5);
                var quote = $('#quote-content').html(quote).text();
                document.getElementById('quote-content').value = quote;
            },
            cache: false
        });
    });

    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }
</script>
<script type="text/javascript">
    function initializeAutocomplete(id) {
        var element = document.getElementById(id);
        if (element) {
            var autocomplete = new google.maps.places.Autocomplete(element, {
                types: ['geocode']
            });
            google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
        }
    }

    function onPlaceChanged() {
        var place = this.getPlace();

        for (var i in place.address_components) {
            var component = place.address_components[i];
            for (var j in component.types) {
                var type_element = document.getElementById(component.types[j]);
                if (type_element) {
                    type_element.value = component.long_name;
                }
            }
        }

        var longitude = document.getElementById("longitude");
        var latitude = document.getElementById("latitude");
        longitude.value = place.geometry.location.lng();
        latitude.value = place.geometry.location.lat();
    }

    google.maps.event.addDomListener(window, 'load', function() {
        initializeAutocomplete('user_input_autocomplete_address');
    });
</script>