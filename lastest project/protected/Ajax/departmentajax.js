/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


//<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#department_code').on('blur', function() {
        var deptCode = $(this).val();
        $.ajax({
          url: 'check_dept.php',
          method: 'GET',
          data: {department_code: departmentCode},
          dataType: 'json',
          success: function(data) {
            $('#department_name').val(data.name);
            $('#department_desc').val(data.description);
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });
      $('form').on('submit', function(e) {
        e.preventDefault();
        // Perform form submission via Ajax or traditional POST method here
      });
    });
  </script>
  
  $(document).ready(function() {
      $('#department_code').on('blur', function() {
        var deptCode = $(this).val();
        $.ajax({
          url: 'check_dept.php',
          method: 'GET',
          data: {dept_code: deptCode},
          dataType: 'json',
          success: function(data) {
            $('#dept_name').val(data.name);
            $('#dept_desc').val(data.description);
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });
    });