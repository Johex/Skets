<!DOCTYPE html>

<head>

    <meta charset="UTF-8">
    
    <title>Chat</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
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
    <div id="score-wrapper">
    </div>


</body>
