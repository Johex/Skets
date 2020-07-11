<?php
/* Header */
$page_title = 'Skets';
include __DIR__ . '/tpl/head.php';
?>
<div class="container">
    <div class="row">
        <div class="column col-9">
            <h1>canvas</h1>
<!--            <canvas id="canvas" width="500" height="500" style="border:1px solid #000000;"></canvas>-->
            <img id="drawing" width="500" height="500"/>
        </div>
        <div class="column col-2">
            <div id="score-wrapper">

            </div>
        </div>
        <div class="column col-2">
            <div id="page-wrap">

                <h2>Chat</h2>

                <p id="name-area"></p>

                <div id="chat-wrap"><div id="chat-area"></div></div>

                <form id="send-message-area">
                    <b>Your message: </b>
                    <textarea id="bericht" maxlength = '100' ></textarea>
                </form>
                <button id="erase" name="erase" type="button" onclick="reset()">Reset score</button>
                <script>
                    add_user(name);
                </script>

            </div>
        </div>
    </div>


    <div id="score-wrapper">

    </div>
<?php
include __DIR__ . '/tpl/footer.php';
?>