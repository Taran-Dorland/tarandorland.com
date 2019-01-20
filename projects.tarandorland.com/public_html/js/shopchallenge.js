

function favouriteItem() {

    //Capture the URL which contains the ID of the obj to favourite
    var currentLocation = window.location.href;
    var strId = currentLocation.substring(55);

    //Get correct id of element to clone
    var oldId = "r".concat(strId);

    //Get element with correct ID
    var p = document.getElementById(oldId);

    document.getElementById(oldId).checked = true;

    //Clone
    var p_prime = p.cloneNode(true);
    p_prime.id = "rn".concat(strId);

    //Add to html
    document.getElementById('favCon').appendChild(p_prime);




}