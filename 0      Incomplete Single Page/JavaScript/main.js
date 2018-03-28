
function updateView(newView)
{
    document.getElementById('viewBlock').innerHTML = newView;
}

// Formatting:
// service_functionName()

//=========//
// Nav Bar //
//=========//

function navBar_display()
{
    document.getElementById('navBar').style.display ='block'; 
}


//========//
// Log In //
//========//

function logIn_getView()
{
    $.ajax(
        {
            type: "POST",
            url: "Services/serv_logIn_getView.php",
            data: {},
            success: function(newView)
            {
                updateView(newView);
            }
        });
}

function logIn_validate(uname, pword)
{
    $.ajax(
        {
            type: "POST",
            url: "Services/serv_logIn_validate.php",
            data: {username: uname, password: pword},
            success: function(newView)
            {
                updateView(newView);
            }
        });
}

function logIn_getData()
{
    var name = document.getElementById('username').value;
    var pass = document.getElementById('password').value;

    logIn_validate(name, pass);
}

//================//
// Create Account //
//================//

function accCreate_getView()
{
    $.ajax(
        {
            type: "POST",
            url: "Services/serv_accCreate_getView.php",
            data: {},
            success: function(newView)
            {
                updateView(newView);
            }
        });
}

function accCreate_create(uname, pword, cword, fname, lname, dob)
{
    $.ajax(
        {
            type: "POST",
            url: "Services/serv_accCreate_create.php",
            data: {username: uname, password: pword, password_con: cword, firstname: fname, lastname: lname, bday: dob},
            success: function(newView)
            {
                updateView(newView);
            }
        });
}

function accCreate_getData()
{
    var uname =  document.getElementById('username').value;
    var pword =  document.getElementById('password').value;
    var cword =  document.getElementById('password_con').value;
    var fname =  document.getElementById('firstname').value;
    var lname =  document.getElementById('lastname').value;
    var dob   =  document.getElementById('bday').value;

    accCreate_create(uname, pword, cword, fname, lname, dob);
}

//==============//
// Account Edit //
//==============//

function accEdit_reactivate(ID)
{
    $.ajax(
        {
            type: "POST",
            url: "Services/serv_accEdit_reactivate.php",
            data: {userID: ID},
            success: function(newView)
            {
                updateView(newView);
            }
        });
}

//======//
// Feed //
//======//

function feed_getPosts(ID, datestamp)
{

}