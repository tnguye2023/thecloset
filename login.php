<!DOCTYPE html>  
<html lang="en">
    <head>
        

        <title>THE CLOSET | LOGIN</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 

        <meta name="author" content="Tracy Nguyen (tn9eer) and Rachel Ding (rd7bk)">
        <meta name="description" content="Login page">
        <meta name="keywords" content="login, clothes">
        <link rel="stylesheet" href="styles.css">     
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">    

        <script src="https://code.jquery.com/jquery-3.6.0.js"
	    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	    crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#submit").click(function(){
                    var status = true;
                    var errorMsg = "Please fill in all fields properly: \n";

                    // Validates name input so that it is not empty AND both first and last names are provided
                    function nameValidation(){
                        if($("#name").val() == ""){
                            $("#name").css('border','1px solid red');
                            errorMsg += "First and Last Name \n";
                            status = false;	
                            $("#checkName").html("*Please provide a name");
                        }
                        else if(! /^[A-Z][a-z]+\s[A-Z][a-z]+$/.test($("#name").val())){
                            $("#name").css('border','1px solid red');
                            errorMsg += "First and Last Name \n";
			                status = false;	
                            $("#checkName").html("*Please provide first AND last name");
                        }
                    }

                    // Validates email input so that it is not empty and a domain a provided
                    function emailValidation(){
                        if($("#email").val() == ""){
                            $("#email").css('border','1px solid red');
                            errorMsg += "Email Address \n";
                            $("#checkEmail").html("*Please provide an email");
			                status = false;	
                        }
                        else if($("#email").val().indexOf(".") <= -1){
                            $("#email").css('border','1px solid red');
                            errorMsg += "Email Address \n";
                            $("#checkEmail").html("*Please provide a .domain");
			                status = false;	
                        }
                    }

                    // Anonymous Function for password validation
                    // Validates password input so that it is not empty and is between 8-20 characters
                    let passValidation = function(){
                        if($("#password").val() == ""){
                            $("#password").css('border','1px solid red');
                            errorMsg += "Password \n";
                            status = false;	
                            $("#checkPass").html("*Please provide a password");
                        }
                        else if(! /^[a-zA-Z].{8,20}$/.test($("#password").val())){
                            $("#password").css('border','1px solid red');
                            errorMsg += "Password \n";
                            status = false;	
                            $("#checkPass").html("*Please provide a password between 8 and 20 characters");
                        }
                    };

                    // Name Validation
                    if($("#name").val() == "" || ! /^[A-Z][a-z]+\s[A-Z][a-z]+$/.test($("#name").val())){
                        nameValidation();
                    }
                    else{
                        $("#name").css('border','1px solid green');
                        $("#checkName").html("");
                    }

                    // Email Validation
                    if($("#email").val() == "" || $("#email").val().indexOf(".") <= -1){
                        emailValidation();
                    }
                    else{
                        $("#email").css('border','1px solid green');
                        $("#checkEmail").html("");
                    }

                    // Password Validation
                    if($("#password").val() == "" || ! /^[a-zA-Z0-9].{8,20}$/.test($("#password").val())){
                        passValidation();
                    }
                    else{
                        $("#password").css('border','1px solid green');
                        $("#checkPass").html("");
                    }
                    // If all form inputs are correct, submit form and log in
                    if(status == true){
                        return status;
                    }
                    // At least one input is not filled in properly
                    else{
                        alert(errorMsg);
                        return status;
                    }
                    
                });
	        });
            
        </script>
    
    </head>  
    <body>


        <!-- <div class="card" style="width: 25rem;">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div> -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-6 col-lg-6" style="padding: 0;">
                    <div>
                        <!-- img-fluid makes img responsive -->
                        <img src="https://cdn.cnn.com/cnnnext/dam/assets/160511082542-best-department-stores-bon-marche-paris3-full-169.jpg" class="w-100 vh-100" style="object-fit: cover;" alt="Department store image"> 
                    </div>

                </div>
                <div class="col-xs-1 col-sm-1 col-md-6 col-lg-6 login" style="padding: 0;">
                    <h1>THE CLOSET</h1>
                    <h2>High-brand. High savings.</h2>
                    <h3>Find great deals on your favorite high-end brands from others around you.</h3>

                    <div class="card" style="width: 28rem; border-radius: 0;">
                        <div class="card-body">
                            <h3>Welcome!</h3>
                            <?=$error_msg?>
                            <form action="?command=login" method="post"> 
                                <div class="form-group">
                                  <label for="name">First and Last Name</label>
                                  <input type="text" class="form-control" name="name" id="name" placeholder="ex. John Smith">
                                  <p id="checkName" style="color: red"></p>
                                </div>
                                
                                <div class="form-group">
                                  <label for="email">Email address</label>
                                  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                                  <p id="checkEmail" style="color: red"></p>
                                </div>
                                <div class="form-group">
                                  <label for="password">Password</label>
                                  <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                  <p id="checkPass" style="color: red"></p>
                                </div>
                                <!-- <a class="btn btn-primary" href="market.html" role="button">Log In</a> -->
                                <button id="submit" type="submit" class="btn btn-primary">Log In / Register</button>
                              </form>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


        </div>

        
        
        
        

        

        <!-- <footer>
            <nav class="foot">
                <ul>
                    <li><a href="detail.html">hehehehehehehehehe</a></li>
                </ul>
            </nav>
        </footer> -->

        <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    </body>
</html>