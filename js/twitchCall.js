

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


function callAPI() {

  var username = document.getElementById("in1").value;
  var requestName = "https://api.twitch.tv/helix/users?login=" + username;

  var request = new XMLHttpRequest();

  request.open("GET", requestName, true);
  request.setRequestHeader("Client-ID", "x0w2s0l4ac6952e95t5pj4wg80rp13");

  request.onload = function() {
    
    var array = JSON.parse(this.response);

    //console.log(array.data[0].login);

    //Reference for accessing multiple users at once
    console.log(array.data[0]);
    //console.log(array.data[1]);

    document.getElementById("li1").innerHTML = array.data[0].id;
    document.getElementById("li2").innerHTML = array.data[0].login;
    document.getElementById("li3").innerHTML = array.data[0].display_name;
    
  };


  request.send();

}
