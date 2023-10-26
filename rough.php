 <div id="Text" class="tabcontent"><br>
        <label><strong>Text:</strong></label><br>

        <label>Text Color:</label>
                <input type="color" name="color"><br>
                  <label>Font Size :</label>
                <input type="text" id="fontSizeInput" name="font_size"> px<br> 
               <input type="range" id="fontSizeSlider" >
<input type="checkbox" id="h1" name="textType" value="h1"><label for="h1">h1</label>
<input type="checkbox" id="h2" name="textType" value="h2"><label for="h2">h2</label>
<input type="checkbox" id="h3" name="textType" value="h3"><label for="h3">h3</label>
<input type="checkbox" id="p" name="textType" value="paragraph"><label for="p">Paragraph</label>
<input type="checkbox" id="all" name="textType" value="all"><label for="all">All</label>

<!--                <input type="number" id="fontSizeInput" name="font_size" min="1" max="100" value="16">px<br>
               <input type="range" id="fontSizeSlider" min="10" max="100" value="12">-->
<label for="font_family">Font Family:</label>
<select name="font_family" id="font_family">
    <option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
    <option value="Times New Roman, Times, serif">Times New Roman, Times, serif</option>
    <option value="Courier New, Courier, monospace">Courier New, Courier, monospace</option>
    <option value="Georgia, serif">Georgia, serif</option>
    <option value="Verdana, Geneva, sans-serif">Verdana, Geneva, sans-serif</option>
</select>
<br>


        <label>Text Align:</label>
        <select name="text_align" class="custom-select">
            <option value="">Select</option>
            <option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
            <option value="justify">Justify</option>
        </select><br>
        <label>Text Shadow:</label>
  <select name="text_shadow_select" class="custom-select">
    <option value="">Select</option>
    <option value=" black">Shadow 1</option>
    <option value="gray">Shadow 2</option>
    <option value=" darkgray">Shadow 3</option>
   <option value=" blue">Shadow 4</option>
<option value=" red">Shadow 5</option>
<option value=" green">Shadow 6</option>
   
  </select><br>

        <label>Text Decoration:</label>
        <select name="text_decoration" class="custom-select">
            <option value="">Select</option>
            <option value="none">None</option>
            <option value="underline">Underline</option>
            <option value="overline">Overline</option>
            <option value="line-through">Line Through</option>
        </select><br>