<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

?>
    <style>
   
        
        
       
    flex($direction, $wrap, $justify, $align)
    display: flex
    flex-flow: $direction $wrap
    justify-content: $justify
    align-items: $align
body
    height: 100%
    padding: 0
    display: block
    margin: 0
    background: #202344
    font: 20px Helvetica
    font-weight: 300
a
    &:hover
        text-decoration: none
h1 
    font-size: 35px
    margin: auto 0 25px
    color: #fff
    letter-spacing: 3px
    font-weight: 600
    width: 100%
    text-align: center
.flex_container
    +flex(row, wrap, center, center)
    min-height: 100vh
    letter-spacing: 3px
    color: rgba(255, 255, 255, 0.8)
    padding: 40px 0
    box-sizing: border-box
    overflow: hidden
.noise_btn
    display: block
    position: relative
    width: 282px
    height: 80px
    font-weight: 700
    line-height: 26px
    text-transform: uppercase
    letter-spacing: 2.7px
    margin: 20px 30px
    font-size: 13px
    color: #fff
    margin-bottom: auto
    opacity: 0
    cursor: pointer
    &.canvas-ready
        opacity: 1
    &--bg
        color: #202344
    strong
        position: absolute
        +flex(row, wrap, center, center)
        top: 0px
        left: 0px
        height: 100%
        width: 100%
        z-index: 2
.noise-container
    display: block
    position: relative
.noise-canvas
    position: absolute
    top: -20px
    width: calc(100% + 40px)
    height: calc(100% + 40px)
    left: -20px
    pointer-events: none
    z-index: 1
footer
    font-size: 16px
    letter-spacing: 2px
    text-align: center
    color: #fff
    padding: 30px
    a
        color: #f33232
        text-decoration: none
    </style>

<body>
    <h1>Hello World</h1>
    <div class="ripple">
        <button id="button">Click This</button>
                <button id="button2">Click This</button>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#button').click(function() {
                var element = $(this);
                element.addClass('shake');
                setTimeout(function() {
                    element.removeClass('shake');
                }, 500);
            });
        });
    </script>
    <script>
   
</script>

</body>
