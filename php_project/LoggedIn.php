<?php
    session_start();
    $diaryContent="";
    if(array_key_exists("id",$_COOKIE)){
        $_SESSION['id'] = $_COOKIE['id'];
    }

    if(array_key_exists("id",$_SESSION)){
        //echo "<p>Logged In! <a href='diary.php?logout=1'>log out</a></p>";
        include("connection.php");
        $quer ="SELECT diary FROM users WHERE id=".mysql_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
        $row = mysqli_fetch_array(mysqli_query($link, $query));
        $diaryContent =$row['diary'];
    }else{
        header("Location: diary.php");
    }
    include("header.php");
?>
    
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Secrect diary</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
            <a href='diary.php?logout=1'><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log Out</button></a>
        </form>
      </div>
    </nav>
    <div class="container-fluid" id="containerLoggedInPage">
        <textarea id="diary" class="font-control">
            <?php echo $diaryContent; ?>
        </textarea>
    </div>
         
<?pho
    include("footer.php");
?>