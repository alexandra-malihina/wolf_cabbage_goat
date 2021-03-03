class Play{
    constructor(){

        this.ajax_play_actions({action:"get_data"}, "GET");

        this.boat=$('#boat');
        this.messages={
            "start":"Перевези всех на левый берег, но помни, что некоторых товарищей нельзя оставлять без присмотра на одном берегу!<br> Не дай победить кое-кому...",
            "win":"Молодец! Ты разгадал загадку! Попробуй решить по-другому!",
            "lose":"You are lose.<br>Satana is win."
        }
        this.audio = new Audio();
        this.audio.autoplay = false;
        this.rules=false;

    }
    set_rules(){
        let inst=this;
        this.data.rules.forEach((item, i) => {
            let element=$('<div><img class="rule" src="./src/images/'+inst.data.objects[item[0]].image+'"/>+<img class="rule" src="./src/images/'+inst.data.objects[item[1]].image+'"/> = <img class="rule" src="./src/images/death.png"/></div>');
            $('#rules').append(element);
        });
        this.rules=true;
    }
    sound_object(sound)
    {
        this.audio.pause();
        this.audio.src = "./src/sound/"+sound;
        this.audio.play();

    }
    session_destroy(){
        this.ajax_play_actions({action:"session_destroy"},"GET");
    }
    set_step(){
        let element=$('.choose');

        if(element.data('key')!=undefined){

            this.ajax_play_actions({action:"step",object_id:element.data('key')},"GET");
        }
        else{
            this.ajax_play_actions({action:"step",object_id:4},"GET");
        }
    }
    show_message(){
        if(this.messages[this.data.state]!=undefined){
            $('#modal_text').html(this.messages[this.data.state]);
            $('#modal_message').show();

            if(this.data.state!="start"){
                this.sound_object(this.data.state+".mp3");
                $('#modal_img').fadeIn(3000);
                $('#modal_img').css('background-image','url("./src/images/'+this.data.state+'.png")')    
            }


        }

    }
    restart(){
        this.ajax_play_actions({action:"restart"},"GET");
    }
    set_objects(){

        let ground_right_side=$('#ground_right_side');
        let ground_left_side=$('#ground_left_side');
        console.log(this.data);

        let objects= this.data.objects;
        ground_right_side.empty();
        ground_left_side.empty();
        let current_side="right";
        objects.forEach((object, i) => {

            if (object.layout=="ground"){

                let element=$("<div class='object' data-key='"+i+"'></div>");
                element.css('background-image','url("./src/images/'+object.image+'")');
                if(object.side=="right"){



                    ground_right_side.append(element);
                }
                else{
                    //let element=$("<div class='object' data-key='"+i+"'>"+object.name+"</div>");
                    ground_left_side.append(element);
                }
            }
            if(object.name=="boat"){
                let element=$('#boat');
                current_side=object.side;
                if (!element.hasClass(object.side+"_side"))
                {
                    element.removeClass();
                    element.addClass(object.side+"_side");
                }
            }
        });

        if(current_side=="right"){
            ground_right_side.children().addClass("pointer").bind('click',choose_object);
        }
        else{
            ground_left_side.children().addClass("pointer").bind('click',choose_object);
        }



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
                inst.set_objects();
                inst.show_message();
                if (inst.rules==false){
                    inst.set_rules();
                }
            }
        });
    }

}

var play = new Play();
