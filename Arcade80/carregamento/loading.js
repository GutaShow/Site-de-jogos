function carregar(){
    var time = 16000
    setTimeout(() => {
        window.location.href = 'http://localhost/Arcade80/1fase/game.php'
    }, time);

    let elemento = document.querySelector('#contador');
    let contador = 15;

    setInterval(() => elemento.innerHTML = contador--, 1000);
 
        
    $(document).keypress(function(e) {
        if(e.which == 13) $('#enter').click();
        window.location.href = "http://localhost/Arcade80/1fase/game.php";
    });

}