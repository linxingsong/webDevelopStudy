<?php
    session_start();
    $error ="";
    $result="";
    $hashedPassword="";
    if(array_key_exists("logout",$_GET)){
        unset($_SESSION);
        setcookie("id","", time()-60*60);
        $_COOKIE["id"]="";
    }else if((array_key_exists("id",$_SESSION) AND $_SESSION['id']) OR (array_key_exists("id",$_COOKIE) AND $_COOKIE['id'])){
        header("Location: LoggedIn.php");
    }

    if(array_key_exists("submit", $_POST)){
        include("connection.php"); 
        
        if(!$_POST['email']){
            $error .="An email is required.<br>";
        }
        if(!$_POST['password']){
            $error .="A password is required.<br>";
        }
        if($error !=""){
            $error ="<p>There are error in the form.</p>".$error;
        }else{
            if($_POST['signUp']=='1'){
                //query using marieDB query language.
                $query ="SELECT id FROM users WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."'";   
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result) > 0){
                    $error ="That email address is taken.";
                }else{
                    $query = "INSERT INTO users(email,password) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";
                    if(!mysqli_query($link,$query)){
                        $error ="<p>Could not sign up.</p>";
                    }else{
                        //$query = "UPDATE users SET password = '".MD5(MD5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id =".mysqli_insert_id($link)." Limite 1";
                        $_SESSION['id']=mysqli_insert_id($link);
                        if($_POST['stayLogin']=='1'){
                            setcookie("id",mysqli_insert_id($link), time()+60*60*24*30);
                        }
                        header("Location: LoggedIn.php");
                    }
                }
            }else{
                $query ="select id from users where email ='".mysqli_real_escape_string($link,$_POST['email'])."'";
                $result = mysqli_query($link, $query);
                $row=mysqli_fetch_array($result);
                if(isset($row)){
                    $hashedPassword = md5(md5($row['id']).$_POST['password']);
                    if(hashedPassword == $row['password']){
                        $_SESSION['id']=$row['id'];
                        if($_POST['stayLogin']=='1'){
                            setcookie("id", $row['id'], time()+60*60*24*30);
                        }
                        header("Location: LoggedIn.php");
                        }else{
                            $error ="That email/password combination is not found.";
                        }
                    }else{
                        $error ="That email/password combination is not found.";
                }
            }   
        }
    }


?>

<?php include("header.php");?>
        <div class="container" id="homePageContainer">
            <h1>Secret Diary</h1>
            <p><strong>Write Yor Journal.</strong></p>
            <div id="error"><?php
                if($error!=""){
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';   
                }
            ?></div>

            <form method ="post" id="signUpForm">
                <p>Intersted? Sign Up now.</p>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="stayLogin" value=1> Stay Log in
                    </label>
                </div>
                <div class="form-group">
                    <input type="hidden" name="signUp" value="1">
                    <input type="submit" class="btn btn-success" name="submit" value="Sign Up!">  
                </div>
                <p><a class="toggleForm" href="#">Log In</a></p>
            </form>

            <form method ="post" id="logInForm">
                <p>Log in using your username and password</p>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="stayLogin" value=1> Stay Log in
                    </label>
                    <input type="hidden" name="signUp" value="0">
                </div>
                <div class="form-group">
                    
                    <input type="submit" class="btn btn-success" name="submit" value="Log In!">
                </div>
                <p><a class="toggleForm" href="#">Sign Up</a></p>
            </form>
        </div>
<?php include("footer.php"); ?>