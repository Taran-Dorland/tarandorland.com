

function load() {

    var channel = document.getElementById("in1").value;
    var sizeWidth = window.innerWidth || document.body.clientWidth;
    var sizeHeight = window.innerHeight || document.body.clientHeight;
    var ttvEmbed;

    ttvEmbed = new Twitch.Embed("twitch-embed", {
        width: sizeWidth,
        height: sizeHeight,
        channel: channel
    });

}