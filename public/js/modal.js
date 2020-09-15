var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady() {
   player = new YT.Player('player', {
      height: '365,99',
      width: '650',
      videoId: 'd0D8tTtY4lU',
   });
}

$("a").on("click", function() {
   $("table").show();
   player.playVideo();
});

$(".fechar").on("click", function(e) {
   player.stopVideo();
});


function mudaModal(id){
   var modal = document.getElementsByClassName('modal');
   modal.setAttribute("id", id);
}