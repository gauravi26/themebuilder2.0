// Global flag variable to track whether the page-specific theme has been applied
var pageSpecificThemeApplied = false;

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
            // Set a flag to indicate that the page-specific theme has been applied
            pageSpecificThemeApplied = true;

            console.log('Response:', response); // Log the response to the console

            // Apply the CSS response to .span-19
            $('.span-19').css('cssText', response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the error case here
            console.error('AJAX request failed:', textStatus, errorThrown);
        }
    });
});
