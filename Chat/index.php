<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="chat.js"></script>
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
