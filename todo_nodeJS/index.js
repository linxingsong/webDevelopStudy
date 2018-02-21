var express = require('express'),
    app     = express(),
    bodyParser = require('body-parser');


var todoRoutes = require('./routes/todo');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: true}));

app.get('/', function(req, res){
  res.send('Root router.');
})

app.use('/api/todo', todoRoutes);




var Port = process.env.PORT || 3000;
app.listen(Port, function(){
  console.log("App is runing on PORT "+ Port);
});
