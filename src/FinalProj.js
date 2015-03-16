
/**
* Creates an XML HTTP Request Object
* used for each AJAX call
*/
function requestObject(){
	var ready;
	var request;
	var method = "POST";
	this.loadDoc = function (url, params){
		if (window.XMLHttpRequest){
			request = new XMLHttpRequest();

		}
		if (params.length == 4){
			document.getElementById("userCheck").innerHTML = "";
		}
		if (request){
			request.onreadystatechange = function(){
				if (request.readyState == 4 && request.status == 200){
					document.getElementById("userCheck").innerHTML = request.responseText;
				}
			};
			request.open(method, url, true);
			request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			request.send(params);
		}
	}
}

/**
* Checks the database to see if username already exists via AJAX
* str = The username as it's being typed (start checking if length > 3)
*/
function checkUsers(str){
	
	if (str.length > 1){
		if (str.length < 4){
			document.getElementById("userCheck").innerHTML = "Username must be longer than 3 characters.";
		}
		else{
			var req = new requestObject();
			var params = "username="+encodeURIComponent(str);
			req.loadDoc("http://web.engr.oregonstate.edu/~grahamb2/Final/FinalProjSQL.php/", params);
		}
		
	}else{
		document.getElementById("userCheck").innerHTML = "";
	}
}
/*
* validateForm() - checks text entered to make sure it meets 
* minimum requirements. If it doesn't, return true 
*/
function validateForm(){
	var passNotGood = 0;
	var userNotGood = 0;
	var pattern = '/[^a-zA-Z0-9]+$/';
	var x = document.getElementById("user").value;
	var y = document.getElementById("pass").value;
	
	if (x.length > 16){
		document.getElementById("userCheck").innerHTML = "User name can at most be 16 characters long.";
		userNotGood+=1;
	}
	if (/[^a-zA-Z0-9_]/.test(x)){
		document.getElementById("userCheck").innerHTML = "User name may only have letters, numbers, underscores.";
		userNotGood+=1;
	}
	if (x.length < 4){
		document.getElementById("userCheck").innerHTML = "User name must be at least 3 characters long.";	
		userNotGood+=1;
	}
	if (y.length < 6){
		document.getElementById("passCheck").innerHTML = "Password must be have at least 6 characters.";	
		passNotGood+=1;
	}
	if (userNotGood == 0)document.getElementById("userCheck").innerHTML = "";	
	if (passNotGood == 0)document.getElementById("passCheck").innerHTML = "";
	if (userNotGood != 0) {return false;}
	if (passNotGood != 0) {return false;}
	else {
		return true;
	}
}
document.getElementById("images").innerHTML = "";
var imageContainer = document.getElementById("images");
         //Makes an asynch request, loading the getimages.php file
function callForImages() {

	//Create the request object
	var httpReq = (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");

	//When it loads,
	httpReq.onload = function() {

        //Convert the result back into JSON
		var result = JSON.parse(httpReq.responseText);

        //Show the images
    	loadImages(result);
    }

    //Request the page
    try {
        httpReq.open("GET", "../Final/getimages.php", true);
        httpReq.send();
    } catch(e) {
        console.log(e);
    }

}


//Generates the images and sticks them in the container
function loadImages(images) {

    //For each image,
    for(var i = 0; i < images.length; i++) {

        //Make a new image element, setting the source to the source in the array
        var newImage = document.createElement("img");
        newImage.setAttribute("src", images[i]);
        newImage.setAttribute("id", "img");
        //Add it to the container
        imageContainer.appendChild(newImage);

    }

}















