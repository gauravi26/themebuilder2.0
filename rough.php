"js": "document.addEventListener('DOMContentLoaded', function () {\n +
          var style = document.createElement('style');\n +
          style.textContent = 'table td:nth-child(8).red { color: red !important; } table td:nth-child(8).green { color: green !important; }';\n +
          document.head.appendChild(style);\n +
          $(document).ready(function () {\n +
              $('table td:nth-child(8)').each(function() {\n +
                  var percentage = parseInt($(this).text());\n +
                  $(this).removeClass('red green');\n\n +
                  if (percentage < 45) {\n +
                      $(this).addClass('red');\n +
                  } else {\n +
                      $(this).addClass('green');\n +
                  }\n +
              });\n +
          });\n +
      });"
