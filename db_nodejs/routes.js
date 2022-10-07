

exports.index = function(req,res) {
    message = ' ' ;
if(req.method == "POST") {
    var post = req.body;
    var name = post.Username;
    var pass = post.Password;
    var fname = post.Firstname;
    var lname = post.Lastname;
    var mob = post.Mob_num;

    if(!req.files)
            return res.status(400).send('No files were uploaded.');

        var file = req.files.uploaded_image;
        var img_name = file.name;

        if(file.mimetype == "image/jpeg" || file.mimetype == "image/png" || file.mimetype == "image/gif") {
            file.mv('public/images/upload_images/' + file.name, function(err) {
                if(err) 
                    return res.status(500).send(err);
                        var sql = "INSERT INTO `prof_db`( `Firstname`, `Lastname`, `Mob_num`, `Username`, `Password`, `Image`) VALUES ('" + fname + "','" + lname + "','"  + mob + "','" + name + "','" + pass + "','" + img_name + "' )";

                        var query = db.query(sql,function(err,result) {
                            res.redirect('profile/' + result.insertId);
                        });
                    });
        } else {
            message = "This format is not allowed, please upload file with '.png', '.gif', '.jpg'. ";
            res.render('index.ejs',{message: message});
        }
} else {
    res.render('index');
} };

exports.profile = function(req, res) {
    var message = '';
    var id = req.params.ID;
    var sql = "SELECT * FROM `prof_db` WHERE `ID` = '" + id + "' ";
    db.query(sql, function(err, result) {
        if(result.length <= 0) 
            message = "Profile not found!";

            res.render('profile.ejs', {data:result, message: message}); 
        
    });
};

