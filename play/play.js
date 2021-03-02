class Play{
    constructor(){
        console.log('play');
        var inst=this;
        $.ajax({
            url:"./play/play.php",
            method:"GET",
            dataType:"JSON",
            success:function(data){
                console.log(data);
                if(data)
                    inst.set_data(data);

            }
        });
    }
    get_objects(){

    }
    set_objects(){

    }
    set_data(data){
        this.data=data;
        console.log(this);
    }
    session_destroy(){
        ajax_play_actions({action:"session_destroy"},"GET");
    }


}
function ajax_play_actions(data, method){
    $.ajax({
        url:"./play/actions.php",
        method:method,
        data:data,
        success:function(data){
            console.log(data);
        }
    });
}
var play = new Play();
