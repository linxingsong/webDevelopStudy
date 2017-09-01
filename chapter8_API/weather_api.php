<?php
    $weather ="";
    $error="";
    if($_GET['city']){
        $urlContents = file_get_contents("http://samples.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=f4188174d101b63478508fd332c11c6b");
        $weatherArray = json_decode($urlContents,true);
        print_r($weatherArray);
        if($weatherArray['cod'] ==200){
            $weather = "The weather in ".$_GET['city']." is currently ".$weatherArray['weather'][0]['description'].". ";
            $tempInCelcius = intval($weatherArray['main']['temp']-273);
            $weather .= "The temperture is ".$tempInCelcius."&deg;C.<br>";
            $weather .= "The windspeed is ".$weatherArray['wind']['speed']."m/s.";
        }else{
            $error = "Wrong city, plz use a correct one.";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        
        <style type="text/css">
            html{
                background:url(image/background.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size:cover;
                -0-bakcground-size:cover;
                background-size: cover;
            }
            body{
                background: none;
            }
            .container{
                text-align: center;
                margin-top: 100px;
                width: 500px;
            }
            
            #weather{
                margin-top: 15px;
            }
            
        </style>
        
    </head>
    <body>
        
        <div class="container">
            <h1>What's the Weather?</h1>
            <form>
                <div class="form-group">
                    <label for="city">Enter the name of City</label>
                    <input type="text" class="form-control" name="city" id="city" value="<?php  echo $_GET['city'];?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="weather"><?php 
                if($weather){
                    echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
                }
            ?>
            </div>
        </div>
        
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </body>
</html>