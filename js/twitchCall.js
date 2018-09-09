

//Client ID: x0w2s0l4ac6952e95t5pj4wg80rp13
//curl -H Client-ID:x0w2s0l4ac6952e95t5pj4wg80rp13 -X GET https://api.twitch.tv/helix/streams?game_id=33214
//curl -H Client-ID:x0w2s0l4ac6952e95t5pj4wg80rp13 -X GET https://api.twitch.tv/helix/streams?first=20
//curl -H Client-ID:x0w2s0l4ac6952e95t5pj4wg80rp13 -X GET https://api.twitch.tv/helix/users?login=runtness
//curl -H Authorization:45naeyfnm08hw21f2feka6ys1ofacc -X GET https://api.twitch.tv/helix/users?id=44322889


//https://developer.mozilla.org/en-US/docs/Learn/JavaScript/Client-side_web_APIs/Fetching_data
//https://www.w3schools.com/js/js_json_intro.asp
//https://www.w3schools.com/xml/ajax_xmlhttprequest_send.asp
//https://dev.twitch.tv/docs/api/reference/#get-users
//https://dev.twitch.tv/docs/authentication/#getting-tokens
//https://dev.twitch.tv/docs/api/guide/

//==---------------------------------------------------------------------------------------------==
//Makes multiple calls to twitch api to retrieve info and displays it on the page

function callAPI() {

  //Gets the user's input from the input field so it can search for that specific user
  var username = document.getElementById("in1").value;
  var requestName = "https://api.twitch.tv/helix/users?login=" + username;

  //API Call stuff
  var request = new XMLHttpRequest();

  request.open("GET", requestName, true);
  request.setRequestHeader("Client-ID", "x0w2s0l4ac6952e95t5pj4wg80rp13");

  request.onload = function() {
    
    var array = JSON.parse(this.response);

    //console.log(array.data[0].login);

    //Reference for accessing multiple users at once
    //!!!
    console.log(array.data[0]);

    //console.log(array.data[1]);

    //Update HTML with info
    document.getElementById("li1").innerHTML = array.data[0].id;
    document.getElementById("li2").innerHTML = array.data[0].login;
    document.getElementById("li3").innerHTML = array.data[0].display_name;
    document.getElementById('img1').src = array.data[0].profile_image_url;

    //==---------------------------------------------------------------------------------------------==
    //Calling API for followers
    var requestFollows = "https://api.twitch.tv/helix/users/follows?from_id=" + array.data[0].id;
    var requestFol = new XMLHttpRequest();

    requestFol.open("GET", requestFollows, true);
    requestFol.setRequestHeader("Client-ID", "x0w2s0l4ac6952e95t5pj4wg80rp13");

    requestFol.onload = function() {

      var arrayFollows = JSON.parse(this.response);

      //!!!
      console.log(arrayFollows);

      var requestFolConvert = "https://api.twitch.tv/helix/users?id="
      var addOne = "&id=";

      //Add all the ID's here so we can convert them
      for (let i = 0; i < arrayFollows.data.length; i++) {

        if (i != 0) {
          requestFolConvert += addOne;
        }

        requestFolConvert += arrayFollows.data[i].to_id;
      }

      console.log("REQUEST: " + requestFolConvert);

      //==---------------------------------------------------------------------------------------------==
      //Convert ID to display name lul twitch makes this complicated
    
      var requestIDToName = new XMLHttpRequest();
      requestIDToName.open("GET", requestFolConvert, true);
      requestIDToName.setRequestHeader("Client-ID", "x0w2s0l4ac6952e95t5pj4wg80rp13");

      requestIDToName.onload = function() {

        var followerNameArray = JSON.parse(this.response);

        //!!!
        console.log(followerNameArray);

        for (let i = 0; i < followerNameArray.data.length; i++) {

          document.getElementById("p1").innerHTML = document.getElementById("p1").innerHTML + " " + i + ". " + followerNameArray.data[i].display_name;
        }
      };
      requestIDToName.send();
    };
    requestFol.send();
  };
  request.send();
}

//==---------------------------------------------------------------------------------------------==
//Clears info on the page so it doesnt stack with outdated info
function clearAPI() {
  document.getElementById("p1").innerHTML = "";
}