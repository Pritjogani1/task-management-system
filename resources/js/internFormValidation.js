import $ from "jquery";
import "jquery-validation";
window.$ = window.jQuery = $;

$(document).ready(function() {
    $("#internForm").validate({
        rules: {
            name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            }
        },
        messages: {
            name: {
                required: "Please enter your name",
                minlength: "Name must be at least 3 characters long"
            },
            email: {
                required: "Please enter your email",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please enter a password",
                minlength: "Password must be at least 8 characters long"
            },
            password_confirmation: {
                required: "Please confirm your password",
                equalTo: "Passwords do not match"
            },
            phone: {
                required: "Please enter your phone number",
                digits: "Please enter only digits",
                minlength: "Phone number must be at least 10 digits",
                maxlength: "Phone number cannot be more than 15 digits"
            }
        },
        errorElement: 'span',
        errorClass: 'text-red-500 text-sm',
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass('border-red-500');
        },
        unhighlight: function(element) {
            $(element).removeClass('border-red-500');
        }
            
    });
    $("#loginform").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address"     
                },
            password: {
                required: "Please enter your password",
                minlength: "Password must be at least 6 characters long"
            }   

        },
        errorElement: 'span',
        errorClass: 'text-red-500 text-sm',
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass('border-red-500');
        },
        unhighlight: function(element) {
            $(element).removeClass('border-red-500');       
        }
    });
    $("#comment").validate({
        rules: {
            comment: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            comment: {
                required: "Please enter your comment",
                minlength: "Comment must be at least 3 characters long"
            }
        },
        errorElement:'span',
        errorClass:'text-red-500 text-sm',
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass('border-red-500');
        },
        unhighlight: function(element) {
            $(element).removeClass('border-red-500');
        }   
    });
    })