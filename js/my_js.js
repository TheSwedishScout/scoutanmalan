// JavaScript Document
$( document ).ready(function() {
	$( "#annat" ).change(function() {
    	if(this.checked) {
		alert ("Kontakta lägrets intedentur för att diskutera en lämplig lösning.");
		}
	});
	$( "#remove").click(function(){
		if (confirm('Är du säker på att du vill ta bort denna deltagaren')) {
			$( "#nydeltagare" ).attr( "action", "remove_parse.php" );
			$("#nydeltagare").submit();
		} else {
			// Do nothing!
		}
	});
	
	$('html').click(function() {
		$("#popup").addClass("display");
	});
	$('#close_popup').click(function() {
		$("#popup").addClass("display");
	});

	$("#popup").click(function(event){
	    event.stopPropagation();
	});

	$('#burger').click(function(event){
		$('#main_menu ul').toggleClass('open');
	});
	$('main').click(function() {
		/*om class open finns*/
		if($("#main_menu ul.open")){
			$("#main_menu ul").removeClass("open");
			
		}
	});
	
	$("#avdelning").change(function(){
		if($("#avdelning :selected").text() == "Ledare (delad)"){
			/*	
				Ledare delad är vald
				visa alternativet ingen tröja
			*/
		}else{
			/*
				något annat än ledare delad är vald
			*/
		}
	})
	$('#btnSubmit.check').click(function( e ) {    
	    
	    if (register(e)){

	    }else{
	    	e.preventDefault();
	    }
	    
	    	

	});

	function register(e){
		//e.preventDefault();
		var firstName = document.getElementById("textfield");//Validates as required and can only consist of letters
		var lastName = document.getElementById("textfield2");//Validates as required and can only consist of letters
		

		if (lettersOnly(firstName) && lettersOnly(lastName)){
			return true;
		}else{
			return false;
		}
	}
	function lettersOnly(obj){
		var string = obj.value;
		var string = string.trim();

		if (string == "") {
	        alert("Enter a name");
	        obj.focus();
	        return false;
	    }
	    else if (!/^[a-ö A-Ö]*$/g.test(string)) {
	        alert("Invalid characters");
	        obj.focus();
	        return false;
	    }
		else{
			return true;
		}
	}
	function validatePassword(obj){
	    if (obj.value == "") {
	        alert("Enter a email");
	        obj.focus();
	        return false;
	    }
		else if (obj.value.length < 6){
			alert("short password")
			
			obj.focus();
			return false;
		}
		else{
			return true;
		}
	}
	function validateEmail(obj) {
	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    if (obj.value == "") {
	        alert("Enter a email");
	        obj.focus();
	        return false;
	    }
		else if (!re.test(obj.value)){
			alert("not corect email adress")
			obj.focus();
			return false;
		}
		else{
			return true;
		}
	}


});
