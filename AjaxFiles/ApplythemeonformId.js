$(document).ready(function() {
    // Event handler for page load
    $(window).on('load', function() {
        // Make the AJAX request to fetch CSS properties
        var controllerName = $("#controllerId").val();
        var actionName = $("#actionId").val();

        $.ajax({
            url: 'index.php?r=formthememapping/applyThemeToPage',
            type: 'GET',
        dataType: 'html', // Set the data type to 'html'
            data: { controller: controllerName, action: actionName },

            success: function(response) {
               
    console.log('Response:', response); // Log the response to the console

                // Handle the success response here
                // You can access the returned CSS string from the 'response' variable
            $('#page').css('cssText', response);

//                // Create a <style> element and append the CSS styles to it
//                var styleElement = $('<style>').text(response);
//                $('form').append(styleElement);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle the error case here
                console.error('AJAX request failed:', textStatus, errorThrown);
            }
        });
    });
});


