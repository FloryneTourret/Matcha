<div class="col-md-8 mx-auto" style="margin-top:5vh;">
    <h2>Custom search</h2>
    <div class="form-row">
        <div class="form-group col">
            <label for="inputState">Genre</label>
            <select id="orientation" class="form-control" name="orientation">
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Non binaire') {
                            echo 'selected';
                        } ?> value="3">Non binaire</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Homme') {
                            echo 'selected';
                        } ?> value="1">Homme</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Femme') {
                            echo 'selected';
                        } ?> value="2">Femme</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Bisexuel') {
                            echo 'selected';
                        } ?> value="4">Bisexuel</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Tous les genres') {
                            echo 'selected';
                        } ?> value="5">Tous les genre</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label>Localisation</label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
            </div>
            <input class="form-control" type="text" id="user_input_autocomplete_address" placeholder="Votre adresse...">
        </div>
        <input id="street_number" name="street_number" type="hidden">
        <input id="route" name="route" type="hidden">
        <input id="postal_code" name="postal_code" type="hidden">
        <input id="locality" name="locality" type="hidden">
        <input id="country" name="country" type="hidden">
        <input id="latitude" name="latitude" type="hidden">
        <input id="longitude" name="longitude" type="hidden">
    </div>
    <div class="form-row">
        <div class="form-group col">
            <label for="formGroupExampleInput">Distance</label>
            <input type="number" name="distance" class="form-control" id="distance" min="0" placeholder="Valeur en kilomètre">
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="formGroupExampleInput">Age minimum</label>
                <input type="number" name="min_age" class="form-control" id="age_min" min="18" placeholder="<?php echo $_SESSION['user']['age'] - 2 ?>">
            </div>
            <div class="form-group col">
                <label for="formGroupExampleInput">Age maximum</label>
                <input type="number" name="max_age" class="form-control" id="age_max" min="18" placeholder="<?php echo $_SESSION['user']['age'] + 2 ?>">
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-row">
            <div class="form-group col">
                <label for="formGroupExampleInput">Popularité minimum</label>
                <input type="number" name="min_pop" class="form-control" id="pop_min" min="18" placeholder="<?php echo $_SESSION['user']['age'] - 2 ?>">
            </div>
            <div class="form-group col">
                <label for="formGroupExampleInput">Popularité maximum</label>
                <input type="number" name="max_pop" class="form-control" id="pop_max" min="18" placeholder="<?php echo $_SESSION['user']['age'] + 2 ?>">
            </div>
        </div>
    </div>
    <div class="form-group">
        <p>Tags</p>
        <select id="tagselect" name="tags[]" class="selectpicker" multiple>
            <?php
            foreach ($tags as $tag)
                echo '<option>' . $tag['tag_name'] . '</option>';
            ?>
        </select>
    </div>
    <button onclick="sort()" class="btn btn-primary mb-4" style="background-color: #EF6461; color: black; border: none">Submit</button>



    <div class="text-center mb-4">
        <small onclick="sort()" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Match <i class=" fas fa-sort-down"></i></small>
        <small onclick="sort('distance')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Distance <i class=" fas fa-sort-down"></i></small>
        <small onclick="sort('age')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Age <i class=" fas fa-sort-down"></i></small>
        <small onclick="sort('popularite')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Popularité <i class=" fas fa-sort-down"></i></small>
        <small onclick="sort('tags')" class="badge" style="cursor: pointer;background-color: #F0EDF4; padding: 5px 10px 5px 10px; border-radius: 5px; margin: 2px; font-weight: 100; word-break: break-all;white-space: normal;">Tags en commun <i class=" fas fa-sort-down"></i></small>
    </div>



</div>
<div id="users"></div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCFUDkSZ_ocdopTHNoZiZeq7Uq8T8ARhM4"></script>

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

<script>
    function sort(type = 'classic') {
        age_min = document.getElementById('age_min').value;
        if (age_min == '')
            age_min = 'none';
        age_max = document.getElementById('age_max').value;
        if (age_max == '')
            age_max = 'none';

        city = document.getElementById('locality').value;
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
        tags = getSelectValues(document.getElementById('tagselect'));
        tags_user = JSON.stringify(tags)
        if (tags_user == '[]')
            tags_user = "none";

        orientation = document.getElementById('orientation').value;
        if (orientation == '')
            orientation = 'none';

        $("#users").load("/index.php/Recherche/sort/" + type + '?min_age=' + age_min + '&max_age=' + age_max + '&city=' + city + '&distance=' + distance + '&min_pop=' + pop_min + '&max_pop=' + pop_max + '&orientation=' + orientation + '&tags=' + tags_user);
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