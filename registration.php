<?php 
    include "header.php";
    include "db_connection.php";
    session_start();
    $name = $email = $password = $cpassword = "";
    $name_err = $email_err = $pass_err = $cpass_err = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $name_err = "username is required";
        }else{
            $username = input_data($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)){
                $name_err = "Only alphabets and white space are allowed";
            }
        }
        if (empty($_POST["email"])){
            $email_err = "Email is required";
        }else{$email = input_data($_POST["email"]); 
                $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
                if (!preg_match ($pattern, $email) ){ 
                    $email_err = "Invalid email format";  
                }
            }
            if(empty($_POST['password'])){ 
                $pass_err = "Please enter your password!";
            }else if (empty($_POST['cpassword'])){ 
                $cpass_err = "Please enter confirm your password!";
            }else if (input_data($_POST['cpassword'])){ 
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];
                if ($cpassword != $password) {
                    $pass_err = "Your password and confirm password does not match!";
                }
            }
        }
        function input_data($data){  
            $data = trim($data);  
            $data = stripslashes($data);  
            $data = htmlspecialchars($data);  
            return $data;
        }  
        if(isset($_POST['submit'])){
            if($name_err == "" && $email_err == "" && $pass_err == ""  && $cpass_err == ""){  
                if($_POST['password'] == $_POST['cpassword']){
                    $name = mysqli_real_escape_string($db, $_REQUEST['name']);
                    $email = mysqli_real_escape_string($db, $_REQUEST['email']);
                    $password = mysqli_real_escape_string($db, $_REQUEST['password']);
                    $query = mysqli_query($db,"SELECT * FROM user WHERE name='".$name."'");  
                    $numrows = mysqli_num_rows($query);  
                    if($numrows == 0){  
                        $_SESSION['name'] = $name;
                        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
                        if(mysqli_query($db, $sql)){
                            ?><script>window.alert("Account Successfully Created");</script><?php
                            header("refresh:1;login.php");
                        }else{
                            echo "Registration faield.. " . mysqli_error($db);
                        }
                    }else{
                        ?><script>window.alert("That username already exists! Please try again with another.");</script><?php
                    }
                }
            }     
        }
?>
<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST" enctype="multipart/form-data" autocomplete="off">
	<h3 class="font-weight-bold" style="position: absolute; left: 540px; top: 140px">Registration </h3>
    <hr/>
    <div class="container">
        <div class="row content">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <br></br><br></br>
                    <table class="table table-bordered">
	                    <tr>
    	                    <td>username</td>
    	                    <td>
                                <input type="text" placeholder="Username" name="name"/>
                                <span class="error text-danger">* <?php echo $name_err; ?></span>
                            </td>
                        </tr>
	                    <tr>    
    	                    <td>Email</td>
    	                    <td>
                                <input type="email" placeholder="Email" name="email"/>
                                <span class="error text-danger">* <?php echo $email_err; ?></span>
                            </td>
	                    </tr>
	                    <tr>
    	                    <td>Password</td>
    	                    <td>
                                <input type="password" placeholder="Password" name="password"  autocomplete="new-password"/>
                                <span class="error text-danger">* <?php echo $pass_err; ?></span>
                            </td>
	                    </tr>
	                    <tr>
    	                    <td>Confirm Password</td>
    	                    <td>
                                <input type="password" placeholder="confirm Password" name="cpassword" autocomplete="new-password"/>
                                <span class="error text-danger">* <?php echo $cpass_err; ?></span>
                            </td>
	                    </tr>
	                    <tr>
    	                    <td  colspan="3" class="form-group text-center">
        	                    <input type="submit" value="Register" name="submit" class="btn btn-primary" style="font-size:18px;"/>
    	                    </td>
	                    </tr>
	                    <tr>
    	                    <td colspan="3" class="text text-center font-weight-bold">Already registered?<a class="text font-weight-bold text-success" href="login.php">Login here</a></td>
	                    </tr>
                    </table>
                </div>
                <div class="col-sm-4"></div>
            </div> 
        </div>
    </div>      	
</form>    
<?php
include "footer.php";
?>