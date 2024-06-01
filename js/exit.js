$(document).ready(function(){
    $('#exit').click(function(){
        $.post('../destroySession.php', function(data){
            window.location.href = 'login.html';
        });
    });
});