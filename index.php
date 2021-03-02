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
        <div id="content" class='flex_row'>
            <div id="left_side" class='w_100 side' >
            </div>
            <div id="water" class='w_100'>
            </div>
            <div id="right_side" class='w_100 flex_column side' >
                <div class="object pointer">
                    cabbage
                </div>
                <div class="object pointer">
                    goat
                </div>
                <div class="object pointer">
                    wolf
                </div>
            </div>
        </div>
        <div class="absolute flex-column w_100" id="step">
            <div id="set_step" class="pointer">
                step
            </div>
        </div>

        <script type="text/javascript" src="./play/actions.js"></script>
    </body>
</html>
