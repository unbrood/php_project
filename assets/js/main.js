// alert('test');

$(document)
// Looks for the js-register form and only loads that
.on("submit", "form.js-register", function(event) {
    // Prevents default behaviour of the browser
    event.preventDefault()

    var _form = $(this);
    var _error = $(".js-error", _form);
    
    // Collects data from email and password form and saves it to data variable
    var data = {
        email: $("input[type='Email']", _form).val(),
        password: $("input[type='Password']", _form).val()
    };

    // validates length of email address is bigger 6; in case not, show error text
    if(data.email.length < 6) {
        _error
            .text("Please enter valid email address")
            .show();
        // No code below return false is executed in case of error
        return false;
    } else if (data.password.length < 8){
        _error
            .text("Please enter a password that is at least 8 characters long")
            .show();
        return false;
    }

    // If code reaches this point can start ajax process
    // _error.hide();



    
    // outputs the sent data to developer console (remove before deploy!)
    console.log(data);

    return false;
})