function enter(){
    $(document).keypress(function(e) {
        if(e.which == 13) $('#enter').click();
    });
    
    $('a').click(function(e) {
        window.location.href = "login.php";
    });
}