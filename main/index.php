<?php
/* Header */
$page_title = 'Skets';
include __DIR__ . '/tpl/head.php';
?>
<div class="container">
    <h1>Jij bent de tekenaar!</h1>
    <p><em>LET OP</em> zorg dat je het spel met 1 tekenaar start, spreek dit af in de chat</p>
    <div class="row">
        <div class="column col-9">
            <div class="container">
                <div class="row">
                    <div>
                        <canvas id="canvas" width="500" height="500" style="border:1px solid #000000;"></canvas>
                    </div>
                    <div>
                        <div style="border: 1px solid black">
                            <p>Pencils:</p>
                            <button id="black-pencil" class="pencil-button"
                                    style="background-color: black; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="red-pencil" class="pencil-button"
                                    style="background-color: red; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="green-pencil" class="pencil-button"
                                    style="background-color: green; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="blue-pencil" class="pencil-button"
                                    style="background-color: blue; width: 20px; height: 20px; border-radius: 50%"></button>
                            <p>Width:</p>
                            <button id="small-pencil" class="brush-size-button"
                                    style="background-color: white; width: 10px; height: 10px; border-radius: 50%"></button>
                            <button id="medium-pencil" class="brush-size-button"
                                    style="background-color: white; width: 15px; height: 15px; border-radius: 50%"></button>
                            <button id="big-pencil" class="brush-size-button"
                                    style="background-color: white; width: 20px; height: 20px; border-radius: 50%"></button>
                        </div>
                        <div style="border: 1px solid black">
                            <p>Brushes:</p>
                            <button id="black-brush" class="brush-button"
                                    style="background-color: black; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="red-brush" class="brush-button"
                                    style="background-color: red; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="green-brush" class="brush-button"
                                    style="background-color: green; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="blue-brush" class="brush-button"
                                    style="background-color: blue; width: 20px; height: 20px; border-radius: 50%"></button>

                            <p>Width:</p>
                            <button id="small-brush" class="brush-size-button"
                                    style="background-color: white; width: 25px; height: 25px; border-radius: 50%"></button>
                            <button id="medium-brush" class="brush-size-button"
                                    style="background-color: white; width: 30px; height: 30px; border-radius: 50%"></button>
                            <button id="big-brush" class="brush-size-button"
                                    style="background-color: white; width: 35px; height: 35px; border-radius: 50%"></button>
                        </div>
                        <div style="border: 1px solid black">
                            <p>Erasers:</p>
                            <button id="small-eraser" class="erase-button"
                                    style="background-color: white; width: 20px; height: 20px"></button>
                            <button id="medium-eraser" class="erase-button"
                                    style="background-color: white; width: 25px; height: 25px"></button>
                            <button id="big-eraser" class="erase-button"
                                    style="background-color: white; width: 30px; height: 30px"></button>
                        </div>
                        <div style="border: 1px solid black">
                            <p>Fill:</p>
                            <button id="black-fill" class="fill-button"
                                    style="background-color: black; width: 20px; height: 20px"></button>
                            <button id="red-fill" class="fill-button"
                                    style="background-color: red; width: 20px; height: 20px"></button>
                            <button id="green-fill" class="fill-button"
                                    style="background-color: green; width: 20px; height: 20px"></button>
                            <button id="blue-fill" class="fill-button"
                                    style="background-color: blue; width: 20px; height: 20px"></button>
                        </div>
                        <div>
                            <button id="clear-button" class="btn">Clear Field</button>
                        </div>
                        <div>
                            <!--                            <button id="submit" class="btn">Send drawing!</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column col-2">
            <div id="score-wrapper">
            </div>
        </div>
        <div class="column col-2">
            <div id="page-wrap">
                <h2 id="woord_plek"> Klik op new word! </h2>
                <p id="name-area"></p>
                <div id="chat-wrap">
                    <div id="chat-area"></div>
                </div>
                <form id="send-message-area">
                    <b>Your message: </b>
                    <textarea id="bericht" maxlength='100'></textarea>
                </form>
                <button id="woord" name="woord" type="button" onclick="get_word()">Nieuw woord</button>
                <button id="erase" name="erase" type="button" onclick="reset()">Reset score</button>
                <script>
                    add_user(name);
                </script>
                <button id="goToTeken" name="teken" type="button"
                        onclick="window.location.href='guesser.php'">Ga naar raadscherm!!
                </button
            </div>
        </div>
    </div>
    <?php
    include __DIR__ . '/tpl/footer.php';
    ?>




