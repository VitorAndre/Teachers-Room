function HabilitarAreaDeAtuacao() {
    var area_conhecimento = document.getElementById("area_conhecimento");
    if (area_conhecimento.value > 0) {
        document.getElementById("areas_atuacao").removeAttribute("disabled");
    } else {
        document.getElementById("areas_atuacao").setAttribute("disabled", "disabled");
    }

    var request = $.ajax({
        url: "/api/areaAtuacao/",
        method: "GET",
        dataType: "json",
        data: {
            id: document.getElementById("area_conhecimento").value,
        }
    });
    //var msg = document.getElementById('areas_atuacao');
    request.done(function(msg) {
        //msg = JSON.parse(msg);
        var select = document.getElementById("areas_atuacao");
        select.innerHTML = "";
        for (i = 0; i < msg.data.length; i++) {
            var option = document.createElement("option");
            option.setAttribute("value", msg.data[i].nome);
            option.setAttribute("class", "form-control");
            option.text = msg.data[i].nome;
            select.append(option);
        }
    });
    request.fail(function(jqXHR, Status) {
        console.log("erro");
    });
    //    msg.style.backgroundColor = '#fff';
    //    msg.style.fontSize = '1.3em';
}