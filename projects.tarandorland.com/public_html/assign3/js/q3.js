"use strict"

$( document ).ready(function() {

    /*-------------------------------------------------------------------------
    Using the Warframe unofficial API retrieved from: https://api.warframestat.us/pc
    This API is not officially supported by the Warframe devs, instead they supply the
    community with http://content.warframe.com/dynamic/worldState.php and the community
    developed their own JSON API out of this data
    */
   
    //-------------------------------------------------------------------------
    //Retrieve data from JSON
    //https://api.jquery.com/jquery.getjson/

    var pTimeStamp = $("#time");
    var pSortie = $("#sortieInfo");
    var pNightwave = $("#nightwaveInfo");
    var pNews = $("#news");

    var jsonData = [];
    var jsonData2 = [];
    var jsonData3 = [];

    $.getJSON("https://api.warframestat.us/pc", function(data) {

        console.log(data);

        //Get all the data from the JSON
        $.each(data, function(index, element) {

            jsonData.push(element);
        });

        //Output timestamp
        pTimeStamp.html(jsonData[0]);

        //-------------------------------------------------------------------------
        //Get data for sorties
        $.each(jsonData[4], function(index, element) {
            if (index == "variants") {
                jsonData2.push(element);    //Push the array without HTML
            } else {
                jsonData2.push("<span id=sortie" + index + ">" + element + "</span>");
            }
        });

        //Output data for sorties
        pSortie.append(jsonData2[8] + " " + jsonData2[7]);   //Faction
        pSortie.append(jsonData2[10]);  //ETA

        //Get data for missions
        $.each(jsonData2[6], function(index, element) {

            jsonData3.push(element);
        });

        var sortieInfo = [];
        var divMissionInfo = $("#sortieMission");

        for (var i = 0; i < 3; i++) {
            $.each(jsonData3[i], function(index, element) {

                if (index == "missionType" || index == "modifier" || index == "modifierDescription" || index == "node") {
                    sortieInfo.push(element);
                }
            });
        }

        //Output sortie mission info
        var missionSpan = $("#mission0");
        var missionSpanDesc = $("#mission0desc");

        missionSpan.html(missionSpan.html() + sortieInfo[0] + ": " + sortieInfo[3]);
        missionSpan.append("<li class=missiontype>" + sortieInfo[1] + "</li>");

        missionSpan = $("#mission1");
        missionSpanDesc = $("#mission1desc");

        missionSpan.html(missionSpan.html() + sortieInfo[4] + ": " + sortieInfo[7]);
        missionSpan.append("<li class=missiontype>" + sortieInfo[5] + "</li>");

        missionSpan = $("#mission2");

        missionSpan.html(missionSpan.html() + sortieInfo[8] + ": " + sortieInfo[11]);
        missionSpan.append("<li class=missiontype>" + sortieInfo[9] + "</li>");

        //-------------------------------------------------------------------------
        //Get data for nightwave
        jsonData2 = [];
        $.each(jsonData[21], function(index, element) {
           
            if (index == "expiry") {
                jsonData2.push("<span id=nightwave" + index + ">" + index + ": " + element.substring(0, 10) + "</span>");
            } else if (index == "tag") {
                jsonData2.push("<span id=nightwave" + index + ">" + element + "</span>");
            } else {
                jsonData2.push("<li id=nightwave" + index + ">" + index.toUpperCase() + ": " + element + "</li>");
            }
        });

        //Output data for nightwave
        pNightwave.append(jsonData2[6]);    //Tag
        pNightwave.append(jsonData2[3]);    //Expiry

        var divNightwaveInfo = $("#nightwaveMission");
        divNightwaveInfo.append(jsonData2[4]);
        divNightwaveInfo.append(jsonData2[5]);
        divNightwaveInfo.append(jsonData2[7]);
        divNightwaveInfo.append(jsonData2[11]);

        //-------------------------------------------------------------------------
        //Get data for news
        jsonData2 = [];
        $.each(jsonData[1], function(index, element) {
           jsonData2.push(element);
        });

        //Get Data for news
        jsonData3 = [];
        for (var i = 0; i < 14; i++) {
            $.each(jsonData2[i], function(index, element) {

                if (index == "imageLink") {
                    jsonData3.push("<img src=" + element + " class=news" + index + ">");
                } else {
                    jsonData3.push(element);
                }
            });
        }

        //Output news info
        var news1 = $("#news1");
        var news2 = $("#news2");
        var img1 = $("#newsimg1");
        var img2 = $("#newsimg2");

        console.log(jsonData3);

        //Add info to news
        img1.append(jsonData3[99]);
        img2.append(jsonData3[111]);

        img1.attr('href', jsonData3[98]);
        img2.attr('href', jsonData3[110]);

        //Get the english title out of the array as well
        news1.append("<h4>" + jsonData3[106]["en"] + "</h4>");
        news1.append("<span>" + jsonData3[102] + "</span>");

        news2.append("<h4>" + jsonData3[118]["en"] + "</h4>");
        news2.append("<span>" + jsonData3[114] + "</span>");

        //-------------------------------------------------------------------------
        //Set up timers
        var sortieEta = $("#sortieeta");
        var timeStart = sortieEta.html();
        var hours, minutes, seconds;

        var hms = timeStart.split(" ");

        //console.log(hms[1]);    //hour
        //console.log(hms[2]);    //mminute
        //console.log(hms[3]);    //second

        //Get hours
        if (hms[0].length == 2) {
            hours = hms[0].substring(0, 1);
        } else if (hms[0].length == 3) {
            hours = hms[0].substring(0, 2);
        }

        //Get minutes
        if (hms[1].length == 2) {
            minutes = hms[1].substring(0, 1);
        } else if (hms[1].length == 3) {
            minutes = hms[1].substring(0, 2);
        }

        //Get seconds
        if (hms[2].length == 2) {
            seconds = hms[2].substring(0, 1);
        } else if (hms[2].length == 3) {
            seconds = hms[2].substring(0, 2);
        }

        //-------------------------------------------------------------------------

        setInterval(function() {

            seconds--;

            if (seconds == 0) {
                minutes--;
                seconds = 59;
            }

            if ((minutes - 1) == -2) {
                hours--;
                minutes = 59;
            }

            sortieEta.html(hours + "h " + minutes + "m " + seconds + "s");

        }, 1000);

        //-------------------------------------------------------------------------
        //Set up expiry date

        var d = new Date();
        var nwExpiry = $("#nightwaveexpiry");
        var expiryDate = nwExpiry.html();

        expiryDate = expiryDate.substring(8);
        expiryDate = expiryDate.split("-");

        //console.log(expiryDate[0]);     //Year
        //console.log(expiryDate[1]);     //Month
        //console.log(expiryDate[2]);     //Day

        var d2 = new Date(expiryDate[0] + "/" + expiryDate[1] + "/" + expiryDate[2]);

        var diff = Math.abs(d2.getTime() - d.getTime());
        var diffDays = Math.ceil(diff / (1000 * 3600 * 24));

        nwExpiry.html("Remaining: " + diffDays + "days");
    });

});