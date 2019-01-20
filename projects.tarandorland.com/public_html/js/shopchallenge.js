

async function favouriteItem() {

    //Wait
    Console.log("Waiting..");
    await sleep(2000);

    //Capture the URL which contains the ID of the obj to favourite
    var currentLocation = window.location.href;
    var strId = currentLocation.substring(55);

    //Get correct id of element to clone
    var oldId = "r".concat(strId);

    //Get element with correct ID
    var p = document.getElementById(oldId);

    var item = document.getElementById(oldId)
    
    //Check the star
    if (item.checked == false) {
        item.checked = true;
    } else {
        item.checked = false;
    }

    //Clone
    var p_prime = p.cloneNode(true);
    p_prime.id = "rn".concat(strId);

    //Add to html
    document.getElementById('favCon').appendChild(p_prime);




}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}