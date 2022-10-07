var express = require('express')
    , routes = require('./routes') //nodejs library
    , path = require('path'),
    fileUpload = require('express-fileupload'),
    app = express(),
    mysql = require('mysql'),
    bodyParser = require("body-parser");

var connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'kodego2022',
    database: 'profile_database',
    port: '3000',
});

connection.connect(); 

global.db = connection;

//all environments 
app.set('port',process.env.PORT || 3000);
app.set('views',__dirname + '/views');
app.set('view engine','ejs');
app.use(bodyParser.urlencoded({ extended: false}));
app.use(bodyParser.json());
app.use(express.static(path.join(__dirname, 'public')));
app.use(fileUpload());

//development only 
app.get('/', routes.index); //call for main index page
app.post('/', routes.index); //call for signup
app.get('/profile/:id', routes.profile);


//middleware
app.listen(3000);
