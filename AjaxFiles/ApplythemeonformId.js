$(document).ready(function() {
    $.ajax({
        url: 'index.php?r=formtheme/applyThemeToForms',
        type: 'GET',
        success: function(response) {
            console.log('Theme applied successfully.'); // Optional: Display a success message in the console
            
            // Apply the CSS styles to the .form element
            $('.body').css(response);
            
            // Additional code for handling the theme response, if needed
        },
        error: function() {
            console.error('Error applying theme.'); // Optional: Display an error message in the console
            // Additional error handling, if needed
        }
    });
});
