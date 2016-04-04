<html>
<title>ParkMyCar</title>
<head>
<script>

//Primarily for the ajax response of handle in the right vertical form 
function showUser(str) {
  if (str=="") {
    document.getElementById("handle_names").innerHTML="";
    return;
  } 
	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("handle_names").innerHTML=xmlhttp.responseText; //on txtHint div ,table of value return from getuser will printed
    }
  }
  xmlhttp.open("GET","gethint1.php?q="+str,true);
  
  xmlhttp.send();
}

//For the top header form validation
function validateForm() {
    
    var user_name = document.forms["sign_form"]["t1"].value;
    //var access = document.forms["sign_form"]["t2"].value;
	
   
    if (user_name==null || user_name=="") {
        alert("User name must be filled out");
        return false;
}
    re = /^\w+$/;
    if(!re.test(user_name)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      //form.u_name.focus();
      return false;
    }
    
  var pass_word = document.forms["sign_form"]["t2"].value;
    //var conf_t2_word = document.forms["sign_form"]["conf_pass"].value;
     if(pass_word == "" || pass_word==null) {
          alert("Error: Password Empty");
         // form.pass.focus();
          return false;
        }
     
    if(pass_word != "") {
        if(pass_word.length < 6) {
          alert("Error: Wrong Username/Password");
         // form.pass.focus();
          return false;
        }
        re = /[0-9]/;
        if(!re.test(pass_word)) {
          alert("Wrong Username/Password");
         //form.pass.focus();
          return false;
        }
        re = /[a-z]/;
        if(!re.test(pass_word)) {
          alert("Wrong Username/Password");
         // form.pass.focus();
          return false;
        }
        re = /[A-Z]/;
        if(!re.test(pass_word)) {
          alert("Wrong Username/Password");
        //  form.pass.focus();
          return false;
        }
      } 
   

}  
//For the vertical right  signup form     
function validateForm_signup() {
    
	 var first_name = document.forms["sign_up"]["s1"].value;
     if (first_name==null || first_name=="") {
         alert("Handle name must be filled out");
         return false;
 }
     re = /^\w+$/;
     if(!re.test(first_name)) {
       alert("Error: Hadnle must contain only letters, numbers and underscores!");
       //form.u_name.focus();
       return false;
     }
     var last_name = document.forms["sign_up"]["s2"].value;
     if (last_name==null || last_name=="") {
         alert("Full Name name must be filled out");
         return false;
 }
     re = /^\w+$/;
     if(!re.test(last_name)) {
       alert("Error: Full name must contain only letters, numbers and underscores!");
       //form.u_name.focus();
       return false;
     }
     
   var pass_word = document.forms["sign_up"]["s5"].value;
     var conf_pass_word = document.forms["sign_up"]["conf_pass"].value;
     if(pass_word != "" && pass_word == conf_pass_word) {
         if(pass_word.length < 6) {
           alert("Error: Password must contain at least six characters!");
          // form.pass_reg.focus();
           return false;
         }
         if(pass_word == first_name) {
           alert("Error: Password must be different from Username!");
          // form.pass_reg.focus();
           return false;
         }
         re = /[0-9]/;
         if(!re.test(pass_word)) {
           alert("Error: password must contain at least one number (0-9)!");
          //form.pass_reg.focus();
           return false;
         }
         re = /[a-z]/;
         if(!re.test(pass_word)) {
           alert("Error: password must contain at least one lowercase letter (a-z)!");
          // form.pass_reg.focus();
           return false;
         }
         re = /[A-Z]/;
         if(!re.test(pass_word)) {
           alert("Error: password must contain at least one uppercase letter (A-Z)!");
         //  form.pass_reg.focus();
           return false;
         }
       } 
     else if(pass_word != conf_pass_word)
     {
         alert("Error:Your Password Does not Match With The Confirmed Password!");
         return false;

     }
     else {
         alert("Error: Please check that you've entered and confirmed your password!");
       //  form.pass_reg.focus();
         return false;
       }
     var sex = document.forms["sign_up"]["s3"].value;
     if (sex==null || sex=="") {
         alert("sex must be filled out");
         return false;
 }
     
     var email = document.forms["sign_up"]["mail"].value;
     var atpos = email.indexOf("@");
     var dotpos = email.lastIndexOf(".");
     if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
         alert("Not a valid e-mail");
         return false;
     }

  
}      


</script> 
 
<style>
.style1 {
	font-family: "Courier New", Courier, monospace;
	font-size: large;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 36px;
	font-family: "Times New Roman", Times, serif;
}
.a{
align:center;
}
div.signin{
align:right;
border:2px;
float:left;
display:inline;
}

</style>
</head>
<body background="home.jpg" position="absolute">



<form name="sign_form" action="connect_log_in.php" method="post" encrtype="multipart/form-data" onsubmit="return validateForm();"> 	
<table bgcolor="#0033FF" width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="142" rowspan="5" valign="top"><img src="images.jpg" width="175" height="129" alt="av" /></td>
    <td width="221"></td>
    <td width="247"></td>
    <td width="238"></td>
    <td width="86"></td>
    <td width="142"></td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><div align="center" class="style1"></div>
    <div align="center" class="style2">Park My Car </div></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><label><span class="style3">HANDLE</span>
	
        <input type="text" name="t1" /> 
		
    </label></td>
    <td rowspan="2" valign="top"><label><span class="style3">PASSWORD</span>
	
      <input type="password" name="t2" />
	  
    </label></td>
    <td valign="top"><label>
      <input type="submit" name="Submit" value="Submit" />
    </label></td>
    <td ></td>
  </tr>
  
</table>
</form>

<div class="signin"  style="position:relative;width:250px;margin-left :1000px;margin-top:50px;background-color:#E0EAEA;overflow:visible">
<form name="sign_up" action="connect_sign_up.php" method="post" onsubmit="return (validateForm_signup());" >
<fieldset>
<legend><h4>sign up</h4></legend>

Handle or First name <br><input type="text" name="s1"  onkeydown="showUser(this.value)"> <br><br>
<p id="handle_names"></p>
Last Name <br>&nbsp;<input type="text" name="s2"><br><br>
password<br>&nbsp;<input type="password" name="s5"><br><br>
confirm password<br>&nbsp;<input type="password" name="conf_pass"><br><br>
sex<br>&nbsp;<input type="radio" name="s3" value="M">M&nbsp;<input type="radio" name="s3" value="F">F<br><br>

e mail<br>&nbsp;<input type="text" name="mail"><br><br>

<input type="submit" value="submit"><br><br>
</fieldset>

</form>
</div>

</body>
</html>
