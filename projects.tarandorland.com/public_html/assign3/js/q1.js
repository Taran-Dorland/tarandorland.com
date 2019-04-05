"use strict"

$( document ).ready(function() {

    //------------------------------------------------
    //Part 1:
    var q1paragraph = $("p:first");

    //When the paragraph is clicked
    q1paragraph.on("click", function() {

        $(this).css('display', 'none');
    });

    //------------------------------------------------
    //Part 2:
    var q2list = $("ul:first");

    //Toggles the class "yellow" on the ul item
    q2list.on("click", function() {
        
        $(this).toggleClass("yellow");
    });

    //------------------------------------------------
    //Part 3:
    var q3paragraph = $("p:nth-child(1)")

    //Change color of text to red with single click
    q3paragraph.on("click", function() {

        $(this).css('color', 'red');
    });

    //Change color of text to blue with double click
    q3paragraph.on("dblclick", function() {

        $(this).css('color', 'blue');
    });

    //------------------------------------------------
    //Part 4:
    var p4input = $("input:first");
    var p4output = $("p:nth-child(2)");

    //Grabs value from text box on keyup, outputs that val to paragraph
    //http://api.jquery.com/val/
    p4input.on("keyup", function() {

        var val = $(this).val();
        $(p4output).text(val);
    });

    //------------------------------------------------
    //Part 5:
    var p5input1 = $("[min]:first");
    var p5input2 = $("[min]:last");
    var p5button = $("button:first");
    var p5div = $("div:first");

    //Changes the size of the div based on the values
    //inserted into the input boxes
    p5button.on("click", function() {

        p5div.css('width', p5input1.val() + "em");
        p5div.css('height', p5input2.val() + "em");
    });

    //------------------------------------------------
    //Part 6:
    var p6button = $("button:nth-child(2)");
    var p6image = $("img:first");

    //Fades an image in and out when button is clicked
    p6button.on("click", function() {

        p6image.fadeToggle(3000);
    });

    //------------------------------------------------
    //Part 7:
    var body = $("body");
    var itemNum = 6;

    //Adds a new list item after the list item that was clicked
    //https://api.jquery.com/on/#on-events-selector-data-handler
    body.on("click", "ul:last li", function() {

        $(this).after("<li>Item " + (itemNum++) + "</li>");
    });

    //------------------------------------------------
    //Part 8:
    var firstClick = true;
    var p8div = $("div:last");

    //Animates the div based on the click
    //http://api.jquery.com/animate/
    p8div.on("click", function() {

        if (firstClick == true) {

            p8div.hide(2000).delay(1000).show(2000);
            firstClick = false;

        } else {

            p8div.animate({
                height: "0em",
                opacity: "hide"
            }, 3000).delay(1000).animate({
                height: "10em",
                opacity: "show"
            }, 3000);
        }
    });

    //------------------------------------------------
});