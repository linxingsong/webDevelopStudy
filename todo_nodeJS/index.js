var express = require('express'),
    app     = express(),
    bodyParser = require('body-parser');


var todoRoutes = require('./routes/todo');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));
app.use(express.static(__dirname+'/public'));
app.use(express.static(__dirname+"/views"));


app.get('/', function(req, res){
  res.sendFile("index.html");
})

app.use('/api/todo', todoRoutes);




var Port = process.env.PORT || 3000;
app.listen(Port, function(){
  console.log("App is runing on PORT "+ Port);
});
