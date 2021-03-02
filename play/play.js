class Play{
    constructor(){
        console.log('play');
        this.ajax_play_actions({action:"get_data"}, "GET");
    }
    session_destroy(){
        this.ajax_play_actions({action:"session_destroy"},"GET");
    }
    ajax_play_actions(data, method){
        let inst=this;
        $.ajax({
            url:"./play/actions.php",
            method:method,
            dataType:"JSON",
            data:data,
            success:function(data){
                console.log(data);
                inst.data=data;
                console.log(inst.data)

            }
        });
    }

}

var play = new Play();
