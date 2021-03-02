$('.object').click(function(){
    $('.choose').removeClass('choose');
    $(this).addClass('choose');
});
$('#set_step').click(function(){
    play.session_destroy();
    $(this).addClass('choose');
});
