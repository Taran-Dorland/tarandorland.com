var picNum = "1";

function nextPic() {

  switch (picNum) {
    case "1":
    document.getElementById("picOrg").src = "images/img2-original.jpg";
    document.getElementById("picMod").src = "images/img2.png";
    document.getElementById("p-pic-text").innerHTML = "2. Removed *most* of the foot-stool using smart-object average/mean stack-mode.";
    picNum = "2";
    break;

    case "2":
    document.getElementById("picOrg").src = "images/img3_1-original.jpg";
    document.getElementById("picMod").src = "images/img3.png";
    document.getElementById("p-pic-text").innerHTML = "3. Created a composite image using 'load files into stack' script in photoshop.";
    picNum = "3";
    break;

    case "3":
    document.getElementById("picOrg").src = "images/img4-original.png";
    document.getElementById("picMod").src = "images/img4.png";
    document.getElementById("p-pic-text").innerHTML = "4. Changed the colour of hair using a hue mask in photoshop.";
    picNum = "4";
    break;

    case "4":
    document.getElementById("picOrg").src = "images/img5-original.jpeg";
    document.getElementById("picMod").src = "images/img5.png";
    document.getElementById("p-pic-text").innerHTML = "5. Cut/pasted each head onto a different body using quick/selection and lasso tools.";
    picNum = "5";
    break;

    case "5":
    document.getElementById("picOrg").src = "images/img6-original.jpeg";
    document.getElementById("picMod").src = "images/img6.png";
    document.getElementById("p-pic-text").innerHTML = "6. Colourized part of an image using blending effects in photoshop.";
    picNum = "6";
    break;

    case "6":
    document.getElementById("picOrg").src = "images/img7-original.jpg";
    document.getElementById("picMod").src = "images/img7.png";
    document.getElementById("p-pic-text").innerHTML = "7. Blurred the background and added extra shadow details under/around the car using filters and blending effects.";
    picNum = "7";
    break;

    case "7":
    document.getElementById("picOrg").src = "images/img8-original.jpg";
    document.getElementById("picMod").src = "images/img8.png";
    document.getElementById("p-pic-text").innerHTML = "8. Changed the shirt a man was wearing using puppet warp.";
    picNum = "8";
    break;

    case "8":
    document.getElementById("picOrg").src = "images/img9-original.jpeg";
    document.getElementById("picMod").src = "images/img9.png";
    document.getElementById("p-pic-text").innerHTML = "9. Changed the lighting/hue/contrast and saturation using masks and filters.";
    picNum = "9";
    break;

    case "9":
    document.getElementById("picOrg").src = "images/img10-original.jpeg";
    document.getElementById("picMod").src = "images/img10.png";
    document.getElementById("p-pic-text").innerHTML = "10. Extruded the building using filters, also saturated the colours.";
    picNum = "10";
    break;

    case "10":
    document.getElementById("picOrg").src = "images/img1-original.jpeg";
    document.getElementById("picMod").src = "images/img1.png";
    document.getElementById("p-pic-text").innerHTML = "1. Removed the man, filled in the background using content-aware fill.";
    picNum = "1";
    break;
  }
}
