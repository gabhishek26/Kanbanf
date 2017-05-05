 
 

function validateForm()
{
var x=document.forms["formLog"]["userName"].value;


var letnum = /^[0-9a-zA-Z]+$/;
    if(x==null || x=="")
    {
        alert("The combination of username and password is invalid");
        return false;
    }
	if(document.forms["formLog"]["userName"].value.match(letnum))
	{

	}else{
		alert("Please enter valid characters only")
		return false;

	}
    var y=document.forms["formLog"]["pass"].value;
    if(y==null || y=="")
    {
        alert("password is invalid");
        return false;
    }
	if(document.getElementById("humanCheck").checked == false)
	{
	alert("box is not checked");
	return false;
	}
	
    else
    {
		alert("I hit the JS file and returned true");
        return true;
    }
}