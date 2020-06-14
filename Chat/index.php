<!DOCTYPE html>

<head>

    <meta charset="UTF-8">
    
    <title>Chat</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="frontpage.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="header.js"></script>
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
        <div class="column col-9">
            <div class="container">
                <div class="row">
                    <div>
                        <canvas id="canvas" width="500" height="500" style="border:1px solid #000000;"></canvas>
                    </div>
                    <div>
                        <div style="border: 1px solid black">
                            <p>Pencils:</p>
                            <button id="black-pencil" class="pencil-button" style="background-color: black; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="red-pencil" class="pencil-button" style="background-color: red; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="green-pencil" class="pencil-button" style="background-color: green; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="blue-pencil" class="pencil-button" style="background-color: blue; width: 20px; height: 20px; border-radius: 50%"></button>
                            <p>Width:</p>
                            <button id="small-pencil" class="brush-size-button" style="background-color: white; width: 10px; height: 10px; border-radius: 50%"></button>
                            <button id="medium-pencil" class="brush-size-button" style="background-color: white; width: 15px; height: 15px; border-radius: 50%"></button>
                            <button id="big-pencil" class="brush-size-button" style="background-color: white; width: 20px; height: 20px; border-radius: 50%"></button>

                        </div>
                        <div style="border: 1px solid black">
                            <p>Brushes:</p>
                            <button id="black-brush" class="brush-button" style="background-color: black; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="red-brush" class="brush-button" style="background-color: red; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="green-brush" class="brush-button" style="background-color: green; width: 20px; height: 20px; border-radius: 50%"></button>
                            <button id="blue-brush" class="brush-button" style="background-color: blue; width: 20px; height: 20px; border-radius: 50%"></button>

                            <p>Width:</p>
                            <button id="small-brush" class="brush-size-button" style="background-color: white; width: 25px; height: 25px; border-radius: 50%"></button>
                            <button id="medium-brush" class="brush-size-button" style="background-color: white; width: 30px; height: 30px; border-radius: 50%"></button>
                            <button id="big-brush" class="brush-size-button" style="background-color: white; width: 35px; height: 35px; border-radius: 50%"></button>

                        </div>
                        <div style="border: 1px solid black">
                            <p>Erasers:</p>
                            <button id="small-eraser" class="erase-button" style="background-color: white; width: 20px; height: 20px"></button>
                            <button id="medium-eraser" class="erase-button" style="background-color: white; width: 25px; height: 25px"></button>
                            <button id="big-eraser" class="erase-button" style="background-color: white; width: 30px; height: 30px"></button>
                        </div>
                        <div style="border: 1px solid black">
                            <p>Fill:</p>
                            <button id="black-fill" class="fill-button" style="background-color: black; width: 20px; height: 20px"></button>
                            <button id="red-fill" class="fill-button" style="background-color: red; width: 20px; height: 20px"></button>
                            <button id="green-fill" class="fill-button" style="background-color: green; width: 20px; height: 20px"></button>
                            <button id="blue-fill" class="fill-button" style="background-color: blue; width: 20px; height: 20px"></button>
                        </div>
                        <div>
                            <button id="clear-button" class="btn">Clear Field</button>
                        </div>
                        <div>
                            <button id="submit" class="btn">Send drawing!</button>
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



</div>

</body>
