import $ from "jquery";
import "jquery-validation";
window.$ = window.jQuery = $;

$(document).ready(function() {
    $("#adminLoginForm").validate({
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
        }
    });

    $("#taskForm").validate({
        rules: {
            title: {
                required: true,
                minlength: 3,
                maxlength: 100
            },
            description: {
                required: true,
                minlength: 10
            },
            user_id: {
                required: true
            },
            due_date: {
                required: true,
                date: true
            },
            priority: {
                required: true
            },
            status: {
                required: true
            }
        },  
            messages: {
            title: {
                required: "Please enter a task title",
                minlength: "Title must be at least 3 characters",
                maxlength: "Title cannot exceed 100 characters"
            },
            description: {
                required: "Please enter a description",
                minlength: "Description must be at least 10 characters"
            },
            user_id: "Please select a user",
            due_date: {
                required: "Please select a due date",
                date: "Please enter a valid date"
            },
            priority: "Please select a priority level",
            status: "Please select a status"
        },
        errorElement: 'span',
        errorClass: 'text-red-500 text-sm',
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass('border-red-500').removeClass('border-green-500');
        },
        unhighlight: function(element) {
            $(element).removeClass('border-red-500').addClass('border-green-500');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

    $("#commentForm").validate({
        rules: {
            content: {
                required: true,
                minlength: 2,
                maxlength: 500
            }
        },
        messages: {
            content: {
                required: "Please enter a comment",
                minlength: "Comment must be at least 2 characters",
                maxlength: "Comment cannot exceed 500 characters"
            }
        },
        errorElement: 'span',
        errorClass: 'text-red-500 text-sm',
        errorPlacement: function(error, element) {
            error.insertAfter(element);
        },
        highlight: function(element) {
            $(element).addClass('border-red-500').removeClass('border-green-500');
        },
        unhighlight: function(element) {
            $(element).removeClass('border-red-500').addClass('border-green-500');
        },
        submitHandler: function(form) {
            form.submit();  
        }   
    });
});