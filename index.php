<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>wolf_cabbage_goat</title>
        <link rel="stylesheet" href="./src/css/style.css">
    </head>
    <body>
        <script
          src="https://code.jquery.com/jquery-3.5.1.min.js"
          integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
          crossorigin="anonymous"></script>
        <script type="text/javascript" src="./play/play.js"> </script>
        <?php
        include './play/play.php';
         ?>
         <div id="rules" class="absolute">
             Нельзя оставлять без присмотра:
         </div>
         <div id="modal_message">
             <div id="modal_body" class="flex_column ">
                 <div id="modal_img">

                 </div>
                 <div id="modal_text">

                 </div>
                 <div id="button_ok" class="pointer">
                     ok
                 </div>
             </div>
         </div>
        <div id="content" class='flex_row'>
            <div id="ground_left_side" class='w_100 flex_column side' >
            </div>
            <div id="water" class='w_100 flex_column side'>
                <div id="boat" class="right_side">

                </div>
            </div>
            <div id="ground_right_side" class='w_100 flex_column side' >

            </div>
        </div>
        <div class="absolute flex-column w_100" id="step">
            <div id="set_step" class="pointer">
                Переплыть
            </div>
        </div>


        <script type="text/javascript" src="./play/actions.js"></script>
    </body>
</html>
