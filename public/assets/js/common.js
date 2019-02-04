$(document).ready(function () {
    /* Smooth scrolling */
    var options = {
        offset: 56,
        duration: 1500
    };
    UIkit.scroll($(".transformed a"), options);
    UIkit.scroll($("#offcanvas .links a"), options);

    //Contact form validation
    $('#contactForm').submit(function (event) {
        event.preventDefault();
        const formData = $(this).serialize()
        const errors = checkForErrors()
        if (errors.length === 0) {
            //AJAX call
            postContactData($('#contactForm'), formData);
        } else {
            $("#success").hide();
            $("#errors").html("");
            $.each(errors, function (index, errormessages) {
                $('#errors').hide().append(`<p>${errormessages}</p>`).fadeIn(300);
            })
        }
    })
});

function postContactData(form, formData) {
    $.post('/contact', formData, function(data) {
        if(data.errors) {
            $("#success").hide();
            $("#errors").html("");
            $.each(data.errors, function (index, errormessages) {
                $('#errors').hide().append(`<p>${errormessages.message}</p>`).fadeIn(300);
            }) 
        } else {
            $("#errors").hide();
            $("#success").hide().html(data.success).slideDown(400);
            form.trigger("reset");
        }
    }, 'json')
}

function checkForErrors() {
    var errors = []
    var fname = $('#fname');
    var lname = $('#lname');
    var pnumber = $('#pnumber');
    var email = $('#email');
    var message = $('#message');

    if (fname.val() == "") {
        errors.push("Enter your first name");
        fname.addClass('error')
    } else {
        fname.removeClass('error');
    }
    if (lname.val() == "") {
        errors.push("Enter your last name");
        lname.addClass('error')
    } else {
        lname.removeClass('error');
    }
    if (pnumber.val() == "") {
        errors.push("Enter your phone number");
        pnumber.addClass('error')
    } else {
        pnumber.removeClass('error');
    }
    if (email.val() == "") {
        errors.push("Enter your email");
        email.addClass('error')
    } else {
        email.removeClass('error');
    }
    if (message.val() == "") {
        errors.push("Enter your message");
        message.addClass('error')
    } else {
        message.removeClass('error');
    }

    return errors
}