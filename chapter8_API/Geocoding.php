
<html>
    <head>
        <title>Geocodeing An Address</title>
    </head>
    
    <body>
    
    </body>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script type="text/javascript">
        $.ajax({
            url :"https://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&key=AIzaSyCAMcqYB_u8yloqpilFihisPUEAkd7UCVk",
            type: "GET",
            success: function(data){
                $.each(data['result'][0], function(key, value){
                    if(value['type'][0] == 'country'){
                        alert(value['short_name']);
                    }
                   
                })
            }
        })
    
    </script>
    
</html>    


