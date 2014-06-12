<?php
session_start();

if(isset($_POST["SignumID"]) && isset($_POST["Password"]))
{

$SignumID=$_POST['SignumID'];
$Password=$_POST['Password'];

//Connect to MSSQL database 
   
$myServer = "10.184.20.93";
$myUser = "sa";
$myPass = "optomation@123";
$myDB = "tab"; 
   
//create an instance of the ADO connection object
$conn = new COM ("ADODB.Connection")
  or die("Cannot start ADO");

//define connection string, specify database driver
$connStr = "PROVIDER=SQL Server Native Client 10.0 ;SERVER=".$myServer.";UID=".$myUser.";PWD=".$myPass.";DATABASE=".$myDB; 
  $conn->open($connStr); //Open the connection to the database

// $connect=mssql_connect("10.184.20.93","sa","optomation@123") or die("Cannot connect to the server");
// mssql_select_db("tab") or die (Cannot connect to the database);
$query = "
SET NOCOUNT ON
exec [USERMANAGEMENT].[dbo].[user_sp_authenticateUser] '" . $SignumID . "','" . $Password . "' ";

$rs = $conn->execute($query);


$num_columns = $rs->Fields->Count();
for ($i=0; $i < $num_columns; $i++) {
    $fld[$i] = $rs->Fields($i);
} 
            
while (!$rs->EOF)  //carry on looping through while there are record
{
for ($i=0; $i < $num_columns; $i++)
    {
                if ($i == 0)
                {
                $existCount =  "$fld[$i]" ;           
                }
				}
                $rs->MoveNext(); //move on to the next record
///close the connection and recordset objects freeing up resources
}
$rs->Close(); 

if ($existCount == 1)
{
$_SESSION['SignumID'] = $SignumID;
$_SESSION['Password'] = $Password;
echo "You are logged in!";
header("location: member.php");
exit();
}
else
{
echo 'That information is incorrect';
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> Login Page </title>
<center> <h3> ACD </h3> </center>
<div id="container" style="width:1300px">


<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href = "css/bootstrap.css" />
<link rel="image" href="img/glyphicons-halflings.png" type="image" />
<link rel=”stylesheet” 
href=”http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css”>
 
<link rel=”stylesheet” 
href=”http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css”>
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"> </script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js">
</script>
<style type= "text/css">
 .bs-example {
 margin:20px;
 }
 </style>
 <style type="text/css">
   .panel-heading:hover {
   background color:#FAEBD7!important;
   }
   </style>
   <div class="row" >
   
   <div class="col-xs-5">
    
<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="p"><b>User Login</b></div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="http://10.184.20.93/UM/USERMANAGEMENT/forgot.html">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                           </head> 
						   <body>
						   <script>
function myFunction()
{
var usn=document.getElementById('sig').value;
var pwd=document.getElementById('pass').value;

alert('sig');
alert('pass');
</script>

                        <form id="loginform" class="form-horizontal" role="form" action="login1.php" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="SignumID" value="" placeholder="Enter SignumID">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
							
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="Password" placeholder="Enter Password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>


                                
                                    <!-- Button -->
                               
                                    
									<div class="form-group"> <div style="margin-bottom:25px" class="col-sm-8">
                                      <input type="submit" class="btn btn-primary btn-lg" value="Log In! "onclick="myFunction();"> <br>
                                      
</form>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Want to register! 
                                        <a href="http://10.184.20.93/UM/USERMANAGEMENT/register.html" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Register here!
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                                



                        </div>                     
                    </div>  
        </div>
		</div>

</div>
		<script src="../assets/js/jquery-1.8.3.min.js"></script>
		
		
    
		</body>
		</html>















