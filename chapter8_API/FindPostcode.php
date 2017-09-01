<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <title>Postcode Finder</title>  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container">
      <h1>Postcode Finder</h1>  
      <p> Enter a partial address to get the postcode.</p>
        <div id="message"></div>
      <form>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter the address">
        </div>
        <button type="submit" class="btn btn-primary" id="find-postcode">Submit</button>
      </form>
    </div>
      
    
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      
    <script type="text/javascript">
      
          $("#find-postcode").click(function(e) {
      
        e.preventDefault();
              
        $.ajax({
            url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent($("#address").val()) + "&key=AIzaSyCAMcqYB_u8yloqpilFihisPUEAkd7UCVk",
            type: "GET",
            success: function (data) {
                
                console.log(data);
                
                if (data["status"] != "OK") {
                    
                    $("#message").html('<div class="alert alert-warning" role="alert">Postcode could not be found - please try again.</div>');
                    
                } else {
                
                $.each(data["results"][0]["address_components"], function (key, value) {
                    
                    if (value["types"][0] == "postal_code") {
                        
                    $("#message").html('<div class="alert alert-success" role="alert"><strong>Postcode found!</strong> The postcode is ' + value["long_name"] + '.</div>');
                    
                    }
                    
                })
                
                }
            }
            
        })
      })
      </script>
  </body>
</html>