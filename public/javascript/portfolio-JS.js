
$(document).ready(function(){
    $('#contactForm').submit(function(event){
        checkForErrors()
        event.preventDefault();
    })
})


function checkForErrors(){
    var errors= []
    var fname= $('#fname');
    var lname= $('#lname');
    var pnumber=$('#pnumber');
    var email=$('#email');
    var message=$('#message');

    if(fname.val() == ""){
        errors.push("Enter your first name");
        fname.addClass('error')
    }else{
        fname.removeClass('error');
    }
    if(lname.val() == ""){
        errors.push("Enter your last name");
        lname.addClass('error')
    }else{
        lname.removeClass('error');
    }
    if(pnumber.val() == ""){
        errors.push("Enter your phone number");
        pnumber.addClass('error')
    }else{
        pnumber.removeClass('error');
    }
    if(email.val() == ""){
        errors.push("Enter your email");
        email.addClass('error')
    }else{
        email.removeClass('error');
    }
    if(message.val() == ""){
        errors.push("Enter your message");
        message.addClass('error')
    }else{
        message.removeClass('error');
    }
    if(errors.length > 0){
        $("#errors").html("");
        $.each(errors, function(index, errormessages){
            $('#errors').hide().append(`<p>${errormessages}</p>`).fadeIn(300);
        })
    }

}















