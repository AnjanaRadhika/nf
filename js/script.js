$("#menu").hover(function() {
	$("#image_off").attr("src", "images/graymenu.png");
});
$("#menu").mouseleave(function() {
	$("#image_off").attr("src", "images/menu.png");
});
$(function () {
	$("#signuppassword, #newpassword").bind("keyup", function () {

	 
	   //Regular Expressions.
	    var regex = new Array();
	    regex.push("[A-Z]"); //Uppercase Alphabet.
	    regex.push("[a-z]"); //Lowercase Alphabet.
	    regex.push("[0-9]"); //Digit.
	    regex.push("[$@$!%*#?&]"); //Special Character.
	 
	    var passed = 0;
	 
	    //Validate for each Regular Expression.
	    for (var i = 0; i < regex.length; i++) {
	       if (new RegExp(regex[i]).test($(this).val())) {
	             passed++;
	        }
	    }
	 
	 
	    //Validate for length of Password.
	    if (passed > 2 && $(this).val().length > 8) {
	        passed++;
	    }
	 
	     //Display status.
	    var color = "";
	    var strength = "";
		var width = "";

	            switch (passed) {
	                case 0:
	                case 1:
	                    strength = "<p>Weak</p>";
	                    color = "darkorange";
						width = "25%";

	                    break;
	                case 2:
	                    strength = "<p>Good</p>";
	                    color = "darkcyan";
						width = "50%";

	                    break;
	                case 3:
	                case 4:
	                    strength = "<p>Strong</p>";
	                    color = "darkturquoise";
						width = "75%";

	                    break;
	                case 5:
	                    strength = "<p>Very Strong</p>";
	                    color = "#4CAF50";
						width = "100%";

	                    break;
	            }

	$(".progressbar").css("width", width);
	$(".progressbar").css("background", color);
	$(".progressbar").css("color", "white");
	$(".progressbar").css("border-radius", "5px");
	$(".progressbar").css("text-align", "center");
	$(".progressbar").html(strength);

	});
});

