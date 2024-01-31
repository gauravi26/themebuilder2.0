// Check if the flag indicating page-specific theme is applied
if ($('body').data('pageSpecificThemeApplied')) {
    console.log('Page-specific theme already applied. Skipping general theme.');
} else {
    // Proceed with the AJAX request and applying the general theme
    $.ajax({
        url: 'index.php?r=formtheme/applyThemeToForms',
        type: 'GET',
        success: function(response) {
            // Split the response into individual JSON objects
            const jsonResponseArray = response.split('}{');

            // Function to format the CSS properties
            const formatCSS = (cssString) => {
                // Replace 'url('url(' with 'url(' and ')' with ')'
                cssString = cssString.replace(/url\('url\('/g, "url('").replace(/'\)'/g, "')");
                return cssString;
            };

            let linkColor = ''; // Store link color separately
            let otherStyles = ''; // Store other styles separately

            // Parse and apply styles for each JSON object
            jsonResponseArray.forEach((jsonStr, index) => {
                const json = JSON.parse((index === 0 ? '' : '{') + jsonStr + (index === jsonResponseArray.length - 1 ? '' : '}'));
                
                // Apply styles using the appropriate selector (e.g., .span-19)
                if (json && json.css) {
                    const formattedCSS = formatCSS(json.css);
                    const cssArray = formattedCSS.split(';');
                    cssArray.forEach(cssProp => {
                        if (cssProp.trim().startsWith(':link')) {
                            linkColor = cssProp.trim(); // Store link color separately
                        } else {
                            otherStyles += cssProp.trim() + '; '; // Store other styles
                        }
                    });
                }
            });

            // Apply other styles and link color separately
            if (otherStyles) {
                $('.span-19').css('cssText', otherStyles);
            }
            if (linkColor) {
                $('<style>')
                    .text('.span-19 ' + linkColor) // Apply link color to .span-19
                    .appendTo('head');
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX request failed:', textStatus, errorThrown);
        }
    });
}
