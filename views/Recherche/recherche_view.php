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
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
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