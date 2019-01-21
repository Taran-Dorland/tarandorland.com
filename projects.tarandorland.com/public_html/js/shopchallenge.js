

async function favouriteItem() {

    //Wait
    console.log('Waiting..');
    await sleep(50);

    //Capture the URL which contains the ID of the obj to favourite
    var currentLocation = window.location.href;
    var strId = currentLocation.substring(55);

    //Get correct id of element to clone
    //Div
    var oldId = "r".concat(strId);
    //Star
    var sOldId = "st".concat(strId);

    //Get element with correct ID
    var p = document.getElementById(oldId);

    //Star
    var s = document.getElementById(sOldId);

    //Check the star
    if (p.checked == true) {

        p.checked = false;

        //Delete this id
        var newId = "rn".concat(strId);
        var newElem = document.getElementById(newId);

        newElem.remove();

        //Change colour
        s.style.color = "grey";

    } else {
        p.checked = true;

        //Change colour
        s.style.color = "green";

        //Clone
        var p_prime = p.cloneNode(true);
        p_prime.id = "rn".concat(strId);

        //Add to html
        document.getElementById('favCon').appendChild(p_prime);

    }


}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}