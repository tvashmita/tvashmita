<?php 
    include "header.php";
    include "db_connection.php";
    session_start();
    $_SESSION['loginstatus'] = "";    
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_err = "Please Enter Valid Email ID";
        }
        $query = "select *from user where email ='".$_POST['email']."' and password ='".$_POST['password']."'"; 
        $result = mysqli_query($db,$query);
        if(!empty($result)){
            if ($row = mysqli_fetch_array($result)) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['loginstatus']="yes";
                header("Location: welcome.php");
            }else {
                //echo "Incorrect Email or Password!!!";
                ?><script>window.alert("Incorrect EmailId or Password");</script><?php
            }
        }
    }    
?>
<form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="POST" enctype="multipart/form-data" autocomplete="off">
	<h3 class="font-weight-bold" style="position: absolute; left: 500px; top: 140px">Enter Login Details </h3>
    <hr/>
    <div class="container">
        <div class="row content">
            <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <br></br><br></br>
                    <table class="table">
	                    <tr>    
    	                    <td>Email</td>
    	                    <td><input type="email" placeholder="Email" name="email"/>
                            <span class="text-danger"><?php if (isset($email_err)) echo $email_err; ?></span>
                        </td>
	                    </tr>
	                    <tr>
    	                    <td>Password</td>
    	                    <td><input type="password" placeholder="Password" name="password"  autocomplete="new-password"/></td>
	                    </tr>
	                    <tr>
    	                    <td  colspan="2" class="form-group text-center">
        	                    <input type="submit" value="login" name="login" class="btn btn-primary btn-lg" style="font-size:18px;"/>
    	                    </td>
	                    </tr>
	                    <tr>
    	                    <td colspan="2" class="text text-center font-weight-bold">Don't have an account ? <a class="text font-weight-bold text-primary" href="registration.php">Register here</a></td>
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