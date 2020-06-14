let instanse = false;
let state;
let file;

function add_user(nickname){
	$.ajax({
		type: "GET",
		url: "../scoreboard/changeScore.php",
		data: {
			'function': 'add_name',
			'user': nickname,
			'score': 0
		},
		dataType: "json",
		success: function(){

		}
	})
}

//Deze functie vertellt hoeveel messages er in de json file staan. Dat getal wordt elke seconde gecheckt. Als hetaantal toeneemt, worden de nieuwe berichten geprint op het bericht veld.
function chatstatus(){
	if(!instanse){
		 instanse = true;
		 $.ajax({
			   type: "POST",
			   url: "handler.php",
			   data: {  
			   			'function': 'status',
						'file': file
						},
			   dataType: "json",
			
			   success: function(data){
				   state = data.state;
				   instanse = false;
			   },
			});
	}	 
}

//Hiermee worden de nieuwe berichten op het veld geprint
function updateChat(nickname){
	 if(!instanse){
		 instanse = true;
	     $.ajax({
			   type: "POST",
			   url: "handler.php",
			   data: {  
			   			'function': 'update',
						'state': state,
						'file': file
						},
			   dataType: "json",
			   success: function(data){
				   let answer = 1;
				   if(data.text){
						for (let i = 0; i < data.text.length; i++) {
							if(data.text[i].message === answer + "\n") {
								console.log(name + data.text[i].nickname)
								$('#chat-area').append("<p><b>" +  data.text[i].nickname + " heeft het goede antwoord gegeven! </b></p>");
								if (name === data.text[i].nickname){
									console.log('adding score')
									$.ajax({
										type: "GET",
										url: "../scoreboard/changeScore.php",
										data: {
											'user': data.text[i].nickname,
											'score': 1
										}})
								}
							}
							else {
								$('#chat-area').append($("<p> <b>"+ data.text[i].date + ": " + data.text[i].nickname + ": </b>" + data.text[i].message +"</p>"));
							}
                        }								  
				   }
				   document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
				   instanse = false;
				   state = data.state;
			   },
			});
	 }
	 else {
		 setTimeout(updateChat(nickname), 1500);
	 }
}

//Met deze functie wordt je bericht naar het json bestand verstuurd.
function sendChat(message, nickname)
{
    updateChat(nickname);
    let date = new Date().toLocaleString();
     $.ajax({
		   type: "POST",
		   url: "handler.php",
		   data: {  
		   			'function': 'send',
					'message': message,
					'nickname': nickname,
			   		'date': date,
					'file': file
				 },
		   dataType: "json",
		   success: function(){
			   updateChat();
		   },
		});
}

function loadScore(){
	$.get('../scoreboard/score.php', function (data) {
		$('#score-wrapper').html(data)
	})
}
let interval = setInterval(loadScore, 1000)
