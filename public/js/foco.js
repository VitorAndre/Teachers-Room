if(document.getElementById('pag_buscar') =! null){
    foco = document.getElementById('buscar');
    foco.classList.add('active');
}else{
    foco = document.getElementById('cadastrar');
    foco.classList.add('active');
}

function mudaFoco(item){
    if(item === 'buscar'){
        foco = document.getElementById('buscar');
        foco.classList.add('active');

        rmfoco = document.getElementById('cadastrar');
        rmfoco.classList.remove('active');
    }else{
        foco = document.getElementById('cadastrar');
        foco.classList.add('active');

        rmfoco = document.getElementById('buscar');
        rmfoco.classList.remove('active');
    }

}