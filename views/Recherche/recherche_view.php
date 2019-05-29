<style>
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

</style>
<form action="Recherche" method="post" class="col-md-8 mx-auto" style="margin-top:5vh;">
<h2>Custom search</h2>
    <div class="form-row">
        <div class="form-group col">
            <label for="inputState">Genre</label>
            <select id="inputState" class="form-control" name="orientation">
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Non binaire'){echo 'selected';}?> value="3">Non binaire</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Homme'){echo 'selected';}?> value="1">Homme</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Femme'){echo 'selected';}?> value="2">Femme</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Bisexuel'){echo 'selected';}?> value="4">Bisexuel</option>
                <option <?php if ($_SESSION['user']['orientation_name'] == 'Tous les genres'){echo 'selected';}?> value="5">Tous les genre</option>
            </select>
        </div>
    </div>
    <div class="form-group">
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
    <div class="form-row">
        <div class="form-row">
            <div class="form-group col">
                <label for="formGroupExampleInput">Age minimum</label>
                <input type="number" name="min_age" class="form-control" id="formGroupExampleInput" min="18" placeholder="<?php echo $_SESSION['user']['age'] - 2?>">
            </div>
            <div class="form-group col">
                <label for="formGroupExampleInput">Age maximum</label>
                <input type="number" name="max_age" class="form-control" id="formGroupExampleInput" min="18" placeholder="<?php echo $_SESSION['user']['age'] + 2?>">
            </div>
        </div>
        <div class="form-group col">
            <label for="formGroupExampleInput">Distance (en km)</label>
            <input type="number" name="distance" class="form-control" id="formGroupExampleInput" min="0" placeholder="Valeur en kilomètre">
        </div>
    </div>
    <div class="form-group">
        <p>Tags</p>
        <select id="tagselect" name="tags[]" class="selectpicker" multiple>
            <?php 
                foreach($tags as $tag)
                    echo '<option>'.$tag['tag_name'].'</option>';
            ?>
        </select>
    </div>
    <button type="submit" class="button">Submit</button>
</form>
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
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}