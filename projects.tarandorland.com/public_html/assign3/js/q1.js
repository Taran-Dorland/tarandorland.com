"use strict"

$( document ).ready(function() {

    //------------------------------------------------
    //Part 1:
    var q1paragraph = $("#q1p");

    //When the paragraph is clicked
    q1paragraph.on("click", function() {

        $(this).css('display', 'none');
    });

    //------------------------------------------------
    //Part 2:
    var q2list = $("ul.q2ul");

    //Toggles the class "yellow" on the ul item
    q2list.on("click", function() {
        
        $(this).toggleClass("yellow");
    });

    //------------------------------------------------
    //Part 3:
    var q3paragraph = $("#q3p")

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
    var p4input = $("#p4in");
    var p4output = $("#p4out");

    //Grabs value from text box on keyup, outputs that val to paragraph
    //http://api.jquery.com/val/
    p4input.on("keyup", function() {

        var val = $(this).val();
        $(p4output).text(val);
    });

    //------------------------------------------------
    //Part 5:
    var p5input1 = $("#p5in1");
    var p5input2 = $("#p5in2");
    var p5button = $("#p5btn");
    var p5div = $("#p5div");

    //Changes the size of the div based on the values
    //inserted into the input boxes
    p5button.on("click", function() {

        p5div.css('width', p5input1.val() + "em");
        p5div.css('height', p5input2.val() + "em");
    });

    //------------------------------------------------
    //Part 6:
    var p6button = $("#p6btn");
    var p6image = $("#p6img");

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
    body.on("click", "li.p7li", function() {

        $(this).after("<li class=p7li>Item " + (itemNum++) + "</li>");
    });

    //------------------------------------------------
    //Part 8:
    var firstClick = true;
    var p8div = $("#p8div");

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