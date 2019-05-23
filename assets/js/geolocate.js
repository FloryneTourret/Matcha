function getUserAdress(latitude, longitude) {
    $.ajax('https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitude + ',' + longitude + '&key=' + 'AIzaSyCFUDkSZ_ocdopTHNoZiZeq7Uq8T8ARhM4')
        .then(
            function success(response) {
                address = response.results[0].formatted_address
                city = response.results[7].formatted_address.split(',')
                country = response.results[response.results.length - 1].formatted_address
                $.ajax('/index.php/Profile?address=' + address + '&city=' + city[0] + "&country=" + country)
            },
        )
}

function ipLookUp() {
    $.ajax('http://ip-api.com/json')
        .then(
            function success(response) {
                $.ajax('/index.php/Profile?lat=' + response.lat + '&long=' + response.lon)
                getUserAdress(response.lat, response.lon)
            },
        );
}
if ("geolocation" in navigator) {
    navigator.geolocation.getCurrentPosition(
        function success(position) {
            $.ajax('/index.php/Profile?lat=' + position.coords.latitude + '&long=' + position.coords.longitude)
            getUserAdress(position.coords.latitude,
                position.coords.longitude)
        },
        function error(error_message) {
            ipLookUp()

        });
} else {
    ipLookUp()
}