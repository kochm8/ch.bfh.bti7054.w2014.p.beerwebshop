
function Validator(frm) { 

	this.form = document.forms[frm];
	this.result = true;
	
	/*
	 * Checks if field is empty
	 */
	this.validate = function(field) { 

		deleteElementIfExists(field);

		if(this.form[field].value == ""){
			createElement(field, "Field is empty");
			this.result = false;
		}
	}; 

	/*
	 * Validate E-Mail
	 */
	this.validateEmail = function(field) { 

		deleteElementIfExists(field);

		var str = this.form[field].value;
		var atpos = str.indexOf("@");
		var dotpos = str.lastIndexOf(".");
		var regex = /[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/;

		//if ((atpos< 1 || dotpos<atpos+2 || dotpos+2>=str.length) && str != "") {			  
		if (!str.match(regex) && str != ""){
			createElement(field, "Not a valid e-mail address");
			this.result = false;	
			
		}else if(str == ""){
			createElement(field, "Field is empty");
			this.result = false;	
		}
	};

	/*
	 * Checks if 2 fields are equal
	 */
	this.isEqual = function(field1, field2) { 

		deleteElementIfExists(field2);

		if (this.form[field1].value != this.form[field2].value) {
			createElement(field2, "Not equal");
			this.result = false;	
		}
	};


	/*
	 * Validate Phone number
	 */
	this.validatePhone = function(field){

		deleteElementIfExists(field);

		var str = this.form[field].value.replace(/\s+/g, ''); //remove spaces
		var regex = /^\d{10}$/;  
		
		if(!str.match(regex) && this.form[field].value != "") {
			createElement(field, "Not a valid Phone Number");
			this.result = false;
		}

	}
	
	
	/*
	 * Check numeric
	 */
	this.validateNumeric = function(field){

		deleteElementIfExists(field);

		var regex = /^[0-9]+$/;  
		var str = this.form[field].value
		
		if(!str.match(regex) && str != "") {
			createElement(field, "Not a valid Number");
			this.result = false;
		}
	}

	function createElement(field, text){
		var div = document.createElement("div");
		div.id = "validator_"+field;
		var node = document.createTextNode(text);
		div.appendChild(node);
		div.style.color = "red";
		div.style.fontSize = "10px";
		var element = document.getElementById(field);
		element.appendChild(div);
	}
	

	function deleteElementIfExists(field){
		var element = document.getElementById("validator_"+field);
		if(element != null){
			element.parentNode.removeChild(element);
		}
	};


	this.getResult = function(){
		return this.result;
	};
} 