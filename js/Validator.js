
function Validator(frm) { 

	  this.form = document.forms[frm];
	  this.result = true;
	  
	  this.validate = function(field) { 
		  
		  var element = document.getElementById("validator_"+field);
		  if(element != null){
			  element.parentNode.removeChild(element);
		  }
		  
		  if(this.form[field].value == ""){
			  
				var para = document.createElement("div");
				para.id = "validator_"+field;
				var node = document.createTextNode("Validation failed");
				para.appendChild(node);
				var element = document.getElementById(field);
				element.appendChild(para);
	 			this.result = false;
	 		}
	  }; 
	  
	  this.getResult = function(){
		  return this.result;
	  };
} 