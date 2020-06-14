<!DOCTYPE html>

<head>

    <meta charset="UTF-8">

    <title>Chat</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="frontpage.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="header.js"></script>
    <script type="text/javascript" src="scripts/loadImage.js"></script>
    <script src="../draw/scripts/draw.js"></script>
    <script type="text/javascript" src="chat.js"></script>
    <!--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>-->
    <script type="text/javascript">

        // Hier wordt de gebruiker naar zijn naam gevraagd.
        let name = prompt("Enter your chat name:", "Guest");

        // Als er geen naar wordt gegeven, wordt de gebruiker Guest.
        if (!name || name === ' ') {
            name = "Guest";
        }


        $(function() {

            // display name on page
            $("#name-area").html( "<p>" + "You are: " + name + "</p>");

            chatstatus();

            // Hier kan de gebruiker zijn bericht typen
            $("#bericht").keydown(function(event) {

                let key = event.which;

                if (key >= 33) {

                    let maxLength = $(this).attr("maxlength");
                    let length = this.value.length;

                    // Als de maximumlengte wordt overschreden, wordt het typen gestopt
                    if (length >= maxLength) {
                        event.preventDefault();
                    }
                }
            });
            // Als enter wordt gedrukt, wordt het berichtt verzonden
            $('#bericht').keyup(function(e) {

                if (e.keyCode == 13) {

                    let text = $(this).val();
                    let maxLength = $(this).attr("maxlength");
                    let length = text.length;
                    let answer = "appel"

                    if (length < maxLength) {
                        // Hier wordt gecheckt of het juiste antwoord wordt gegeven

                        sendChat(text, name);
                        // bericht vlak wordt leeg gemaakt
                        $(this).val("");

                    } else {
                        // Als de gebruiker meer dan 100 characters typt, worden alleen de eerste 100 verstuurd.
                        $(this).val(text.substring(0, maxLength));

                    }


                }
            });

        });
    </script>

</head>

<body onload="setInterval('updateChat(name)', 1000)">
<header>
    <canvas id="header" style="border: 1px solid black"></canvas>
</header>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>canvas</h1>
<!--            <canvas id="canvas" width="500" height="500" style="border:1px solid #000000;"></canvas>-->
            <img id="drawing" width="500" height="500"/>
        </div>
        <div class="col">
            <h1>chat</h1>
            <div id="page-wrap">

                <h2>Chat</h2>

                <p id="name-area"></p>

                <div id="chat-wrap"><div id="chat-area"></div></div>

                <form id="send-message-area">
                    <b>Your message: </b>
                    <textarea id="bericht" maxlength = '100' ></textarea>
                </form>
                <br><br>
                <script>
                    add_user(name);
                </script>

            </div>
        </div>
    </div>


    <div id="score-wrapper">

    </div>


</body>
