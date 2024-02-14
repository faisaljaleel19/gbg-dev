$(document).ready(function() {

    // Fetch and display user table
    $.ajax({
        url: '/crud/getUsers.php',
        method: 'GET',
        success: function(response) {
            $('#userTableBody').html(response);
        }
    });

    // Hover effect on table rows
    $(document).on('mouseenter', 'tr', function() {
        $(this).css('background-color', '#E3E1D9');
    }).on('mouseleave', 'tr', function() {
        $(this).css('background-color', '');
    });

    $(document).on('mouseenter', '.username', function() {
        $(this).css('cursor', 'pointer');
        $(this).css('color', 'blue');
        $(this).css('font-weight', '700');
        $(this).css('background-color', '#B4D4FF');
    }).on('mouseleave', '.username', function() {
        $(this).css('cursor', 'pointer');
        $(this).css('color', '');
        $(this).css('font-weight', '');
        $(this).css('background-color', '');
    });

    // Delete user
    $(document).on('click', '.deleteBtn', function() {
        var confirmDelete = confirm('Are you sure you want to delete this user?');
        if (confirmDelete) {
            var userId = $(this).closest('tr').find('.userId').text();
            $.ajax({
                url: '/crud/deleteUser.php', // PHP script to fetch user details
                method: 'POST',
                dataType: 'json',
                data: { userId: userId },
                success: function(response) {
                    if(response.status)
                    {
                        alert('User Deleted Successfully');
                        window.location.href='/userList.php';
                    }
                    else
                    {
                        alert('Error occurred while deleting User');
                    }
                }
            });
        }
    });

    // Close popup
    $(document).on('click', '#closePopup', function() {
        $('#popupContainer').hide();
    });

    // Show user details in popup
    $(document).on('click', '.username', function() {
        var userId = $(this).closest('tr').find('.userId').text();
        $.ajax({
            url: '/crud/getUserDetails.php', // PHP script to fetch user details
            method: 'POST',
            dataType: 'json',
            data: { userId: userId },
            success: function(response) {
                console.log(response.data[0].id);
                let userData = '<tr><td>' + response.data[0].username + '</td>';
                userData += '<td>' + response.data[0].email + '</td>';
                userData += '<td>' + response.data[0].birthdate + '</td>';
                userData += '<td>' + response.data[0].phone_number + '</td>';
                userData += '<td>' + response.data[0].url + '</td></tr>';
                $('#userDetails').html(userData);
                $('#popupContainer').show();
            }
        });
    });

    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        if (validateForm()) {
            // If form is valid, submit data
            submitFormData();
        }
    });

    // Validation function
    function validateForm() {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var birthdate = $('#birthdate').val();
        var phone = $('#phone').val();
        var url = $('#url').val();

        var usernameRegex = /^[a-zA-Z]+$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var passwordRegex = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
        var birthdateRegex = /^\d{4}-\d{2}-\d{2}$/;
        var phoneRegex = /^\d{10}$/;
        var urlRegex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-zA-Z0-9]+(\.[a-zA-Z0-9]+)+([\/?].*)?$/;
        
        var date_valid = false;
        var b_date = new Date(birthdate);  
        var now = new Date();  
        console.log(b_date);
        console.log(now);
        console.log(now.getFullYear() - b_date.getFullYear() > 18);
        if ((now.getFullYear() - b_date.getFullYear() > 18) && (now.getFullYear() - b_date.getFullYear() < 80))   
        {  
            date_valid = true;
        }  

        if (!usernameRegex.test(username)) {
            alert('Username must contain letters only.');
            return false;
        }
        if (!emailRegex.test(email)) {
            alert('Invalid email format.');
            return false;
        }
        if (!passwordRegex.test(password)) {
            alert('Password must be at least 8 characters long and contain at least one lowercase letter, one uppercase letter, one digit, and one special character.');
            return false;
        }
        if (!birthdateRegex.test(birthdate)) {
            alert('Invalid birthdate format.');
            return false;
        }
        if(!date_valid)
        {
            alert('Date must not be last 18 years or must be under 80 years.');
            return false; 
        }
        if (!phoneRegex.test(phone)) {
            alert('Phone number must be 10 digits long and contain only numbers.');
            return false;
        }
        if (!urlRegex.test(url)) {
            alert('Invalid URL format.');
            return false;
        }

        return true; // Form is valid
    }

    // Submission function
    function submitFormData() {
        var username = $('#username').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var birthdate = $('#birthdate').val();
        var phone = $('#phone').val();
        var url = $('#url').val();

        $.ajax({
            url: '/crud/createUser.php', 
            method: 'POST',
            dataType: 'json',
            data: {
                username: username,
                email: email,
                password: password,
                birthdate: birthdate,
                phone: phone,
                url: url
            },
            success: function(response) {
                console.log(response);
                if(response.status)
                {
                    alert('User Saved Successfully');
                    window.location.href = '/';
                }
                else
                {
                    alert('Error Occurred while saving user');
                }
            }
        });
    }
});
