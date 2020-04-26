
setInterval(updateArea, 1000)
function updateArea(){
    var alturaTela = $(window).height();
    var posy = $('.left-aulas').offset().top;
    var altura = alturaTela - posy;

    $('.left-aulas, .right-conteudo').css('height',altura + 'px');

}

