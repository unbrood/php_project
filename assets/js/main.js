// alert('test');

$(document)
// Looks for the js-register form and only loads that
.on("submit", "form.js-register", function(event) {
    // Prevents default behaviour of the browser
    event.preventDefault()

    var _form = $(this);
    var _error = $(".js-error", _form);
    
    // Collects data from email and password form and saves it to data variable
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    // validates length of email address is bigger 6; in case not, show error text
    if(dataObj.email.length < 6) {
        _error
            .text("Please enter valid email address")
            .show();
        // No code below return false is executed in case of error
        return false;
    } else if (dataObj.password.length < 8){
        _error
            .text("Please enter a password that is at least 8 characters long")
            .show();
        return false;
    }

    // If code reaches this point can start ajax process
    _error.hide();
    $.ajax({
        type: 'POST',
        url: 'ajax/register.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data){
        // The value for data
        console.log(data);
        if(data.redirect !== undefined){
            window.location = data.redirect;
        } else if(data.error !== undefined){
            _error
                .text(data.error)
                .show();
        }
    })
    .fail(function ajaxFailed(e){
        // When failing
        //console.log(e);
    })
    
    .always(function ajaxAlwaysDone(data){
        // Always executes this
        console.log('Worked');
    })
    // outputs the sent data to developer console (remove before deploy!)
    //console.log(data);

    return false;
})

// Looks for the js-login form and only loads that
.on("submit", "form.js-login", function(event) {
    // Prevents default behaviour of the browser
    event.preventDefault()

    var _form = $(this);
    var _error = $(".js-error", _form);
    
    // Collects data from email and password form and saves it to data variable
    var dataObj = {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };

    // validates length of email address is bigger 6; in case not, show error text
    if(dataObj.email.length < 6) {
        _error
            .text("Please enter valid email address")
            .show();
        // No code below return false is executed in case of error
        return false;
    } else if (dataObj.password.length < 8){
        _error
            .text("Please enter a password that is at least 8 characters long")
            .show();
        return false;
    }

    // If code reaches this point can start ajax process
    _error.hide();
    $.ajax({
        type: 'POST',
        url: 'ajax/login.php',
        data: dataObj,
        dataType: 'json',
        async: true,
    })
    .done(function ajaxDone(data){
        // The value for data
        console.log(data);
        // console.log(data.redirect);
        if(data.redirect !== undefined){
            window.location = data.redirect;
        } else if(data.error !== undefined){
            _error
                .html(data.error)
                .show();
        }
    })
    .fail(function ajaxFailed(e){
        // When failing
        console.log(e);
    })
    
    .always(function ajaxAlwaysDone(data){
        // Always executes this
        console.log('worked!');
    })
    // outputs the sent data to developer console (remove before deploy!)
    // console.log(data);

    return false;
})

// // Looks for the js-dashboard form and only loads that
// .on("submit", "form.js-dashboard", function(event) {
//     // Prevents default behaviour of the browser
//     event.preventDefault()

//     var _form = $(this);
//     var _error = $(".js-error", _form);
    
//     // Collects data from email and password form and saves it to data variable
//     var dataObj = {
//         textfield: $("input[type='textarea']", _form).val(),
//     };

//     // validates length of email address is bigger 6; in case not, show error text
//     if(dataObj.textfield.length < 10) {
//         _error
//             .text("Please enter at least 10 characters")
//             .show();
//         // No code below return false is executed in case of error
//         return false;
//     } else if (dataObj.textfield.length > 1000){
//         _error
//             .text("Comment can't exceed 1000 characters.")
//             .show();
//         return false;
//     }

//     // If code reaches this point can start ajax process
//     _error.hide();
//     $.ajax({
//         type: 'POST',
//         url: 'ajax/dashboard.php',
//         data: dataObj,
//         dataType: 'json',
//         async: true,
//     })
//     .done(function ajaxDone(data){
//         // The value for data
//         console.log(data);
//         if(data.redirect !== undefined){
//             // window.location = data.redirect;
//         } else if(data.error !== undefined){
//             _error
//                 .html(data.error)
//                 .show();
//         }
//     })
//     .fail(function ajaxFailed(e){
//         // When failing
//         console.log(e);
//     })
    
//     .always(function ajaxAlwaysDone(data){
//         // Always executes this
//         console.log('worked');
//     })
//     // outputs the sent data to developer console (remove before deploy!)
//     // console.log(data);

//     return false;
// })