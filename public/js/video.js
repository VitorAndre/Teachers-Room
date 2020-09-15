video = document.getElementById('video');
url = document.getElementById('video_url');

url.addEventListener('keyup', function () {//registo  é feito com addEventListener
    video.disabled = url.value.trim().length > 0;
});
function desativaURL (){
    url.disabled = "disable";
};