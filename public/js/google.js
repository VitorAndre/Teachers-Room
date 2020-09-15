function onSignIn(response) {
    // Conseguindo as informações do seu usuário:
    var perfil = response.getBasicProfile();
    console.log(perfil);

    // Conseguindo o ID do Usuário
    var userID = perfil.getId();

    // Conseguindo o Nome do Usuário
    var userName = perfil.getName();

    // Conseguindo o E-mail do Usuário
    var userEmail = perfil.getEmail();

    // Conseguindo a URL da Foto do Perfil
    var userPicture = perfil.getImageUrl();

    document.getElementById('user-photo').src = userPicture;
    document.getElementById('user-name').innerText = userName;
    document.getElementById('user-email').innerText = userEmail;

    // Recebendo o TOKEN que você usará nas demais requisições à API:
    var LoR = response.getAuthResponse().id_token;
    console.log("~ le Tolkien: " + LoR);
};