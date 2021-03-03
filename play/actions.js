$('.object').click(function(){
    $('.choose').removeClass('choose');
    $(this).addClass('choose');
});

$('#set_step').click(function(){
    play.set_step();
    play.audio.pause();
    console.log('step');
});

function choose_object(){
    let hasClass=$(this).hasClass('choose');;

    $('.choose').removeClass('choose');
    if (!hasClass){
        $(this).addClass('choose');
        play.sound_object(play.data.objects[$(this).data('key')].sound);
    }

}

$('#button_ok').click(function(){
    $('#modal_message').hide();
    $('#modal_img').hide();
    if( play.data.state=="lose" || play.data.state=="win"){
        play.restart();
    }
    play.audio.pause();

});
