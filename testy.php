
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Include jQuery 3.6.4 (replace it with the appropriate version if needed) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables Core -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables CSS (for styling) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <div id="scriptPlaceholder"></div>

    <div class="report-container">
        <h2>HTML TABLE</h2>
        <table id="reportTable" class="report-table display">
            <thead>
                <tr>
                    <th>Roll No.</th>
                    <th>Name</th>
                    <th>English</th>
                    <th>Maths</th>
                    <th>Science</th>
                    <th>Computer Science</th>
                    <th>Social Studies</th>
                    <th>Percent %</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>01</td>
                    <td>Adiya</td>
                    <td>86</td>
                    <td>90</td>
                    <td>56</td>
                    <td>23</td>
                    <td>56</td>
                    <td>30</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Riya</td>
                    <td>54</td>
                    <td>77</td>
                    <td>77</td>
                    <td>92</td>
                    <td>05</td>
                    <td>45</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>

    <!-- DataTable initialization script -->
    <script>
        jQuery(document).ready(function ($) {
            // Event handler for page load
            $(window).on('load', function () {
                // Get the controller and action names
                var controllerName = $("#controllerId").val();
                var actionName = $("#actionId").val();

                // Call the function to fetch CSS properties
                fetchCssProperties(controllerName, actionName);

                // Initialize DataTable after fetching CSS properties
                initializeDataTable();
            });
        });

        // Function to fetch CSS properties
        function fetchCssProperties(controller, action) {
            // Make the AJAX request to fetch CSS properties
            $.ajax({
                url: 'index.php?r=reportThemeMapping/applyThemeReport',
                type: 'GET',
                dataType: 'text', // Change the data type to 'text'
                data: { controller: controller, action: action },
                success: function (data) {
                    // Combine CSS rules into a single string
                    var combinedCssRule = data;

                    // Create a style element and append it to the head
                    var styleElement = $('<style>').text(combinedCssRule);
                    $('head').append(styleElement);
                },
                error: function (xhr, status, error) {
                    // Handle the error, if any
                    console.error("Error fetching CSS properties:", status, error);
                }
            });
        }

        // Function to initialize DataTable
        function initializeDataTable() {
            $('#reportTable').DataTable();
        }
    </script>
</body>
