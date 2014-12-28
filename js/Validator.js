
function Validator(frm) { 

	this.form = document.forms[frm];
	this.result = true;

	this.validate = function(field) { 

		deleteElementIfExists(field);

		if(this.form[field].value == ""){

			var para = document.createElement("div");
			para.id = "validator_"+field;
			var node = document.createTextNode("Field is empty");
			para.appendChild(node);
			var element = document.getElementById(field);
			element.appendChild(para);
			this.result = false;
		}
	}; 

	this.validateEmail = function(field) { 

		deleteElementIfExists(field);

		var atpos = this.form[field].value.indexOf("@");
		var dotpos = this.form[field].value.lastIndexOf(".");

		if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=this.form[field].value.length) {			     

			var para = document.createElement("div");
			para.id = "validator_"+field;
			var node = document.createTextNode("Not a valid e-mail address");
			para.appendChild(node);
			var element = document.getElementById(field);
			element.appendChild(para);
			this.result = false;
		}
	};

	this.isEqual = function(field1, field2) { 

		deleteElementIfExists(field2);

		if (this.form[field1].value != this.form[field2].value) {			     

			var para = document.createElement("div");
			para.id = "validator_"+field2;
			var node = document.createTextNode("Not equal");
			para.appendChild(node);
			var element = document.getElementById(field2);
			element.appendChild(para);
			this.result = false;
		}
	};


	this.validatePhone = function(field){

		deleteElementIfExists(field);

		var str = this.form[field].value.replace(/\s+/g, ''); //remove spaces
		var regex = /^\d{10}$/;  
		if(!str.match(regex) && this.form[field].value != "") {

			createElement(field, "Not a valid Phone Number");
			this.result = false;
		}

	}

	function createElement(field, text){
		
		var para = document.createElement("div");
		para.id = "validator_"+field;
		var node = document.createTextNode(text);
		para.appendChild(node);
		var element = document.getElementById(field);
		element.appendChild(para);
	}
	

	function deleteElementIfExists(field){
		var element = document.getElementById("validator_"+field);
		if(element != null){
			element.parentNode.removeChild(element);
		}
	};


	this.getResult = function(){
		return this.result;
		//return false;
	};
} 