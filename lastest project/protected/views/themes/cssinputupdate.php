<style>
        label {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }
        input[type="number"] {
            width: 50px;
        }
       
        label strong {
  font-size: 20px; /* or any other value you prefer */
}     .tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

.tab button {
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 10px 12px;
  transition: 0.3s;
  font-size: 14px;
}

.label-bold {
  font-weight: bold;
}

.tab button:hover {
  background-color: #ddd;
}

.tab button.active {
  background-color: #ccc;
}

.tabcontent {
  border: 1px solid #ccc;
  padding: 10px;
}

.custom-select {
  width: 120px;
  height: 30px;
  font-size: 14px;
}

button,
input[type="button"],
input[type="submit"],
input[type="reset"] {
  height: 30px;
  font-size: 14px;
}

label {
  height: 30px;
  line-height: 30px;
  font-size: 14px;
}

select {
  height: 30px;
  font-size: 14px;
}

input[type="text"],
input[type="password"],
input[type="email"],
input[type="number"],
input[type="color"],
textarea {
  height: 30px;
  font-size: 14px;
}

</script>


    </style>
 <!-- customupdateview.php Using  -->
<!-- Implement the tab view structure -->
<h1>Custom Update Page </h1>
<div class="tab">
   <button class="tablinks" onclick="openTab(event, 'BoxModel')">Box Model</button>
  <button class="tablinks" onclick="openTab(event, 'Text')">Text</button>
  <button class="tablinks" onclick="openTab(event, 'Background')">Background</button>
  <button class="tablinks" onclick="openTab(event, 'Border')">Border</button>
  <button class="tablinks" onclick="openTab(event, 'Outline')">Outline</button>
  <button class="tablinks" onclick="openTab(event, 'Link')">Link</button>
  <button class="tablinks" onclick="openTab(event, 'Grid')">Grid</button>
  <button class="tablinks" onclick="openTab(event, 'Icon')">Icon</button>
  <button class="tablinks" onclick="openTab(event, 'List')">List</button>
  <button class="tablinks" onclick="openTab(event, 'Tab')">Tab</button>

    <!-- Add more tab links if needed -->
</div>

<!-- Implement the tab content for BoxModel -->
<div id="BoxModel" class="tabcontent">
   
    <form method="post">
        <label><strong>Box Model:</strong></label><br><br>
        <label class="label-bold">Theme Name:</label>
        <input type="text" name="Themes[theme_name]" value="<?php echo $model->theme_name; ?>"><br><br>
        <label>Margin:</label><br>
         <input type="text" name="Themes[margin_top]" value="<?php echo $model->margin_top; ?>">
         <input type="text" name="Themes[margin_right]" value="<?php echo $model->margin_right; ?>">
         <input type="text" name="Themes[margin_bottom]" value="<?php echo $model->margin_bottom; ?>">
         <input type="text" name="Themes[margin_left]" value="<?php echo $model->margin_left; ?>"><br>

        <label>Padding:</label>
        <input type="text" name="Themes[padding_top]" value="<?php echo $model->padding_top; ?>"> px
        <input type="text" name="Themes[padding_right]" value="<?php echo $model->padding_right; ?>"> px
        <input type="text" name="Themes[padding_bottom]" value="<?php echo $model->padding_bottom; ?>"> px
        <input type="text" name="Themes[padding_left]" value="<?php echo $model->padding_left; ?>"> px<br>
        <label>Height:</label>
        <input type="text" name="Themes[height]" value="<?php echo $model->height; ?>"> px<br>
        <label>Width:</label>
        <input type="text" name="Themes[width]" value="<?php echo $model->width; ?>"> px<br>
        <label>Max Height:</label>
        <input type="text" name="Themes[max_height]" value="<?php echo $model->max_height; ?>"> px<br>
        <label>Max Width:</label>
        <input type="text" name="Themes[max_width]" value="<?php echo $model->max_width; ?>"> px<br>
        <label>Min Height:</label>
        <input type="text" name="Themes[min_height]" value="<?php echo $model->min_height; ?>"> px<br>
        <label>Min Width:</label>
        <input type="text" name="Themes[min_width]" value="<?php echo $model->min_width; ?>"> px<br>
        <label>Box Sizing:</label>
        <select name="Themes[box_sizing]" class="custom-select">
            <option <?php if ($model->box_sizing == 'content-box') echo 'selected'; ?> value="content-box">Content Box</option>
            <option <?php if ($model->box_sizing == 'border-box') echo 'selected'; ?> value="border-box">Border Box</option>
        </select><br><br>
        <!-- Add other form fields -->
        <input type="submit" value="Save">
    </form>
</div>
<!-- Implement the tab content for Background -->
<!-- Implement the tab content for Background -->
<div id="Background" class="tabcontent">
    <h3>Background</h3>
    <form method="post">
        <label><strong>Background:</strong></label><br><br>
        <label>Background Color:</label>
        <input type="text" name="Themes[background_color]" value="<?php echo $model->background_color; ?>"><br><br>
        <label>Background Image:</label>
        <input type="text" name="Themes[background_image]" value="<?php echo $model->background_image; ?>"><br><br>
        <label>Background Repeat:</label>
        <select name="Themes[background_repeat]" class="custom-select">
            <option <?php if ($model->background_repeat == 'repeat') echo 'selected'; ?> value="repeat">Repeat</option>
            <option <?php if ($model->background_repeat == 'no-repeat') echo 'selected'; ?> value="no-repeat">No Repeat</option>
            <option <?php if ($model->background_repeat == 'repeat-x') echo 'selected'; ?> value="repeat-x">Repeat Horizontally</option>
            <option <?php if ($model->background_repeat == 'repeat-y') echo 'selected'; ?> value="repeat-y">Repeat Vertically</option>
        </select><br><br>
        <!-- Add other background fields -->
        <input type="submit" value="Save">
    </form>
</div>
<div id="Text" class="tabcontent">
    <h3>Background</h3>
    <form method="post">
        <label><strong>Text:</strong></label><br><br>
        <label>Text Color:</label>
        <input type="text" name="Themes[text_color]" value="<?php echo $model->text_color; ?>"><br><br>
        <label>Letter Spacing:</label>
        <input type="text" name="Themes[letter_spacing]" value="<?php echo $model->letter_spacing; ?>"> px<br><br>
        <label>Word Spacing:</label>
        <input type="text" name="Themes[word_spacing]" value="<?php echo $model->word_spacing; ?>"> px<br><br>
        <label>Line Height:</label>
        <input type="text" name="Themes[line_height]" value="<?php echo $model->line_height; ?>"> px<br><br>
        <label>Text Transform:</label>
        <select name="Themes[text_transform]" class="custom-select">
            <option value="none">None</option>
            <option value="uppercase">Uppercase</option>
            <option value="lowercase">Lowercase</option>
            <option value="capitalize">Capitalize</option>
        </select><br><br>
        <label>Text Align:</label>
        <select name="Themes[text_align]" class="custom-select">
            <option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
            <option value="justify">Justify</option>
        </select><br><br>
        <label>Text Shadow:</label>
        <input type="text" name="Themes[text_shadow]" value="<?php echo $model->text_shadow; ?>"><br><br>
        <label>Text Indent:</label>
        <input type="text" name="Themes[text_indent]" value="<?php echo $model->text_indent; ?>"> px<br><br>
        <label>Text Decoration:</label>
        <select name="Themes[text_decoration]" class="custom-select">
            <option value="none">None</option>
            <option value="underline">Underline</option>
            <option value="overline">Overline</option>
            <option value="line-through">Line-Through</option>
        </select><br><br>
        <label>Text Overflow:</label>
        <select name="Themes[text_overflow]" class="custom-select">
            <option value="visible">Visible</option>
            <option value="hidden">Hidden</option>
            <option value="scroll">Scroll</option>
            <option value="ellipsis">Ellipsis</option>
        </select><br><br>
        <label>White Space:</label>
        <select name="Themes[white_space]" class="custom-select">
            <option value="normal">Normal</option>
            <option value="nowrap">No Wrap</option>
            <option value="pre">Pre</option>
            <option value="pre-line">Pre-Line</option>
            <option value="pre-wrap">Pre-Wrap</option>
        </select><br><br>
        <label>Text Orientation:</label>
        <select name="Themes[text_orientation]" class="custom-select">
            <option value="horizontal">Horizontal</option>
            <option value="vertical">Vertical</option>
        </select><br><br>
        <!-- Add other background fields -->
        <input type="submit" value="Save">
    </form>
</div>
 <form method="post" action="<?php echo Yii::app()->createUrl('/themes/cssinput'); ?>">
        <!-- Box Model -->
       
        <div id = "BoxModel" class="tabcontent"><br>
                <label><strong>Box Model:</strong></label><br>
                <label class="label-bold"> Theme Name :</label>
                <input type="text" name="theme_name"><br>
                <label>Margin:</label>
                <input type="number" name="margin_top" placeholder="Top"> px
                <input type="number" name="margin_right" placeholder="Right"> px
                <input type="number" name="margin_bottom" placeholder="Bottom"> px 
                <input type="number" name="margin_left" placeholder="Left" > px<br> 
                <label>Padding:</label>
                <input type="number" name="padding_top" placeholder="Top"> px
                <input type="number" name="padding_right" placeholder="Right"> px
                <input type="number" name="padding_bottom" placeholder="Bottom"> px
                <input type="number" name="padding_left" placeholder="Left"> px<br> 
                <label>Height:</label>
                <input type="number" name="height"> px<br> 
                <label>Width:</label>
                <input type="number" name="width"> px<br> 
                <label>Max Height:</label>
                <input type="number" name="max_height"> px<br> 
                <label>Max Width:</label>
                <input type="number" name="max_width"> px<br> 
                <label>Min Height:</label>
                <input type="number" name="min_height"> px<br>
                <label>Min Width:</label>
                <input type="number" name="min_width"> px<br> 
                <label>Box Sizing:</label>
                <select name="box_sizing" class="custom-select">
                    <option selected disabled>Select</option>
                    <option value="content-box">Content Box</option>
                    <option value="border-box">Border Box</option>
                </select><br>
            </div>
                <!-- Text -->
                <div id="Text" class="tabcontent"><br>
        <label><strong>Text:</strong></label><br>

        <label>Text Color:</label>
                <input type="color" name="color"><br>
        <label>Letter Spacing:</label>
        <input type="number" name="letter_spacing"> px<br>
        <label>Word Spacing:</label>
        <input type="number" name="word_spacing"> px<br>
        <label>Line Height:</label>
        <input type="number" name="line_height"> px<br>
        <label>Text Transform:</label>
        <select name="text_transform" class="custom-select">
            <option value="">Select</option>
            <option value="uppercase">Uppercase</option>
            <option value="lowercase">Lowercase</option>
            <option value="capitalize">Capitalize</option>
            <option value="none">None</option>
        </select><br>
        <label>Text Align:</label>
        <select name="text_align" class="custom-select">
            <option value="">Select</option>
            <option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
            <option value="justify">Justify</option>
        </select><br>
        <label>Text Shadow:</label>
        <input type="text" name="text_shadow"><br>
        <label>Text Indent:</label>
        <input type="number" name="text_indent"> px<br>
        <label>Text Decoration:</label>
        <select name="text_decoration" class="custom-select">
            <option value="">Select</option>
            <option value="none">None</option>
            <option value="underline">Underline</option>
            <option value="overline">Overline</option>
            <option value="line-through">Line Through</option>
        </select><br>
        <label>Text Overflow:</label>
        <select name="text_overflow" class="custom-select">
            <option value="">Select</option>
            <option value="clip">Clip</option>
            <option value="ellipsis">Ellipsis</option>
        </select><br>
        <label>White Space:</label>
        <select name="white_space" class="custom-select">
            <option value="">Select</option>
            <option value="normal">Normal</option>
            <option value="nowrap">No Wrap</option>
            <option value="pre">Pre</option>
            <option value="pre-wrap">Pre Wrap</option>
            <option value="pre-line">Pre Line</option>
        </select><br>
        <label>Text Orientation:</label>
        <select name="text_orientation" class="custom-select">
            <option value="">Select</option>
            <option value="mixed">Mixed</option>
            <option value="upright">Upright</option>
            <option value="sideways">Sideways</option>
            <option value="sideways-right">Sideways Right</option>
        </select><br>
        <label>Text Wrap:</label>
        <select name="text_wrap" class="custom-select">
            <option value="">Select</option>
            <option value="normal">Normal</option>
            <option value="nowrap">No Wrap</option>
            <option value="break-word">Break Word</option>
        </select><br>
        <label>Float Property</label>
         <select name ="float_property" class="custom-select">
                  <option selected disabled>Select</option>

                <option value ="left">Left</option>
                <option value ="right">Right</option>
                <option value ="initial">Initial</option>
                <option value ="inherit">Inherit</option>
                </select><br>
                </div>
                <div id ="Background" class="tabcontent"><br>
            
                        <label><strong>Background :</strong></label><br>                        
                <label>Background Color:</label>
                <input type="color" name="background_color"><br>
                <label>Background Image:</label>
                <input type="text" name="background_image"><br>
                <label>Repeat:</label>
                    <select name="background_repeat" class="custom-select">
                      <option selected disabled>Select</option>
                      <option value="repeat">Repeat</option>
                      <option value="repeat-x">Repeat Horizontally</option>
                      <option value="repeat-y">Repeat Vertically</option>
                      <option value="no-repeat">No Repeat</option>
                    </select><br>
                    <label>Attachment:</label>
                    <select name="background_attachment" class="custom-select">
                      <option selected disabled>Select</option>
                      <option value="scroll">Scroll</option>
                      <option value="fixed">Fixed</option>
                    </select><br>
                    <label>Position:</label>
                    <select name="background_position" class="custom-select">
                      <option selected disabled>Select</option>
                      <option value="left top">Left Top</option>
                      <option value="left center">Left Center</option>
                      <option value="left bottom">Left Bottom</option>
                      <option value="center top">Center Top</option>
                      <option value="center center">Center Center</option>
                      <option value="center bottom">Center Bottom</option>
                      <option value="right top">Right Top</option>
                      <option value="right center">Right Center</option>
                      <option value="right bottom">Right Bottom</option>
                    </select><br>  
                     </div>
                  <div id ="Border" class="tabcontent"><br>
            
                         <label><strong>Border:</strong></label><br>
                            <label>Border Width:</label><br>
                            <input type="number" name="border_width"> px<br>
                            <label>Border-Style:</label><br>
                            <select name ="border_style" class="custom-select"><br>
                                 <option selected disabled>Select</option>
                                <option value ="hidden">Hidden</option>
                                <option value ="dotted">Dotted</option>
                                <option value ="dashed">Dashed</option>
                                <option value ="solid">Solid</option>
                                <option value ="double">Double</option>
                                <option value ="groove">Groove</option>
                                <option value ="ridge">Ridge</option>

                            </select><br>                
                      </div><br>
                <div id ="Outline" class="tabcontent"><br>
            
                        <label><strong>Outline:</strong></label><br>
                        <label>Outline Style:</label>
                        <select name="outline_style" class="custom-select">
                            <option value="none">None</option>
                            <option value="solid">Solid</option>
                            <option value="dotted">Dotted</option>
                            <option value="dashed">Dashed</option>
                            <option value="double">Double</option>
                            <option value="groove">Groove</option>
                            <option value="ridge">Ridge</option>
                            <option value="inset">Inset</option>
                            <option value="outset">Outset</option>
                        </select><br>
                        <label>Outline Width:</label>
                        <input type="number" name="outline_width"> px<br>
                        <label>Outline Color:</label>
                        <input type="color" name="outline_color"><br>         
                      </div>
                <div id ="Link" class="tabcontent"><br>
            
                        <label><strong>Links:</strong></label><br>
            <label>Link Color:</label>
            <input type="color" name="link_color"><br>
            <label>Visited Link Color:</label>
            <input type="color" name="visited_link_color"><br>
            <label>Hover Link Color:</label>
            <input type="color" name="hover_link_color"><br>
        </div><br>
          <div id ="Icon" class="tabcontent"><br>
            
                        <label><strong>Icon:</strong></label><br>
            <label>Icon Color:</label>
            <input type="color" name="icon_color"><br>
            <label>Icon Size:</label>
            <input type="number" name="icon_size"> px<br>
           
        </div><br>
        <div id="Grid" class="tabcontent"><br>
    <label><strong>Grid:</strong></label><br>
    <label>Grid Template Columns:</label>
    <input type="text" name="grid_template_columns" pattern="\d*" title="Please enter a number"><br>
    <label>Grid Template Rows:</label>
    <input type="text" name="grid_template_rows" pattern="\d*" title="Please enter a number"><br>
    <label>Grid Template Areas:</label>
    <input type="text" name="grid_template_areas"><br>
    <label>Grid Gap:</label>
    <input type="number" name="grid_gap"> px<br>
    <label>Justify Items:</label>
    <select name="justify_items" class="custom-select">
        <option value="start">Start</option>
        <option value="end">End</option>
        <option value="center">Center</option>
        <option value="stretch">Stretch</option>
        <option value="space-around">Space Around</option>
        <option value="space-between">Space Between</option>
        <option value="space-evenly">Space Evenly</option>
    </select><br>
    <label>Align Items:</label>
    <select name="align_items" class="custom-select">
        <option value="start">Start</option>
        <option value="end">End</option>
        <option value="center">Center</option>
        <option value="stretch">Stretch</option>
        <option value="baseline">Baseline</option>
    </select><br>
    <label>Grid Auto Columns:</label>
    <input type="text" name="grid_auto_columns" pattern="\d*" title="Please enter a number"><br>
    <label>Grid Auto Rows:</label>
    <input type="text" name="grid_auto_rows" pattern="\d*" title="Please enter a number"><br>
    <label>Grid Auto Flow:</label>
    <select name="grid_auto_flow" class="custom-select">
        <option value="row">Row</option>
        <option value="column">Column</option>
        <option value="dense">Dense</option>
    </select><br>
    <label>Grid Column:</label>
    <input type="text" name="grid_column_start"><br>
    <label>Grid Row:</label>
    <input type="text" name="grid_column_start"><br>
    <label>Grid Area:</label>
    <input type="text" name="grid_area"><br>

  <!-- Grid properties -->
  <label for="grid_template_areas">Grid Template Areas:</label>
  <input type="text" name="grid_template_areas" id="grid_template_areas"><br>

  <label for="grid_template">Grid Template:</label>
  <input type="text" name="grid_template" id="grid_template"><br>

  <label for="grid_row_gap">Grid Row Gap:</label>
  <input type="number" name="grid_row_gap" id="grid_row_gap"> px<br>

  <label for="grid_column_gap">Grid Column Gap:</label>
  <input type="number" name="grid_column_gap" id="grid_column_gap"> px<br>

  <label for="grid_row_end">Grid Row End:</label>
  <input type="number" name="grid_row_end" id="grid_row_end"> px<br>

  <label for="grid_column_end">Grid Column End:</label>
  <input type="number" name="grid_column_end" id="grid_column_end"> px<br>

  <label for="grid_template_rows_mobile">Grid Template Rows (Mobile):</label>
  <input type="text" name="grid_template_rows_mobile" id="grid_template_rows_mobile"><br>

  <label for="grid_template_columns_mobile">Grid Template Columns (Mobile):</label>
  <input type="text" name="grid_template_columns_mobile" id="grid_template_columns_mobile"><br>

  <label for="grid_template_areas_mobile">Grid Template Areas (Mobile):</label>
  <input type="text" name="grid_template_areas_mobile" id="grid_template_areas_mobile"><br>

  <label for="grid_template_mobile">Grid Template (Mobile):</label>
  <input type="text" name="grid_template_mobile" id="grid_template_mobile"><br>

  <label for="grid_row_gap_mobile">Grid Row Gap (Mobile):</label>
  <input type="number" name="grid_row_gap_mobile" id="grid_row_gap_mobile"> px<br>

  <label for="grid_column_gap_mobile">Grid Column Gap (Mobile):</label>
  <input type="number" name="grid_column_gap_mobile" id="grid_column_gap_mobile"> px<br>

  <label for="grid_gap_mobile">Grid Gap (Mobile):</label>
  <input type="number" name="grid_gap_mobile" id="grid_gap_mobile"> px<br>

  <label for="grid_auto_rows_mobile">Grid Auto Rows (Mobile):</label>
  <input type="text" name="grid_auto_rows_mobile" id="grid_auto_rows_mobile"><br>

  <label for="grid_auto_columns_mobile">Grid Auto Columns (Mobile):</label>
  <input type="text" name="grid_auto_columns_mobile" id="grid_auto_columns_mobile"><br>

  <label for="grid_auto_flow_mobile">Grid Auto Flow (Mobile):</label>
  <input type="text" name="grid_auto_flow_mobile" id="grid_auto_flow_mobile"><br>

  <label for="grid_mobile">Grid (Mobile):</label>
  <input type="text" name="grid_mobile" id="grid_mobile"><br>

  <label for="grid_row_start_mobile">Grid Row Start (Mobile):</label>
  <input type="number" name="grid_row_start_mobile" id="grid_row_start_mobile"> px<br>

  
  <label for="grid_row_start_mobile">Grid Column Start (Mobile):</label>
  <input type="number" name="grid_column_start_mobile" id="grid_column_start_mobile"> px<br>

</div><br>  
<div id="List" class="tabcontent">
 
  <label><strong>List:</strong></label><br>
  <label for="listStyle">List Style:</label>
  <select id="listStyle" name="list_style">
    <option value="">None</option>
    <option value="disc">Disc</option>
    <option value="circle">Circle</option>
    <option value="square">Square</option>
    <option value="decimal">Decimal</option>
    <!-- Add more options as needed -->
  </select><br>
  <label for="listStyleType">List Style Type:</label>
  <select id="listStyleType" name="list_style_type">
    <option value="">Default</option>
    <option value="circle">Circle</option>
    <option value="square">Square</option>
    <option value="decimal">Decimal</option>
    <!-- Add more options as needed -->
  </select><br>
  <label for="listStylePosition">List Style Position:</label>
  <select id="listStylePosition" name="list_style_position">
    <option value="">Default</option>
    <option value="inside">Inside</option>
    <option value="outside">Outside</option>
  </select><br>
      <b>Make sure to which Grip are applied it can create conflict with List Properties</b>

</div>
<br>
<div class="tabs">
  <div class="tab">
    <input type="radio" id="tab1" name="tabGroup" checked>
    <label for="tab1">List</label>
    <div class="tab-content">
      <div id="List" class="tabcontent">
        <label><strong>List:</strong></label><br>
        <label for="listStyle">List Style:</label>
        <select id="listStyle" name="list_style">
          <option value="">None</option>
          <option value="disc">Disc</option>
          <option value="circle">Circle</option>
          <option value="square">Square</option>
          <option value="decimal">Decimal</option>
          <!-- Add more options as needed -->
        </select><br>
        <label for="listStyleType">List Style Type:</label>
        <select id="listStyleType" name="list_style_type">
          <option value="">Default</option>
          <option value="circle">Circle</option>
          <option value="square">Square</option>
          <option value="decimal">Decimal</option>
          <!-- Add more options as needed -->
        </select><br>
        <label for="listStylePosition">List Style Position:</label>
        <select id="listStylePosition" name="list_style_position">
          <option value="">Default</option>
          <option value="inside">Inside</option>
          <option value="outside">Outside</option>
        </select><br>
      </div>
    </div>
  </div>
  <div class="tab">
    <label for="tab2">Tab</label>
    <div class="tab-content">
      <div id="Tab" class="tabcontent">
        <label><strong>Tab:</strong></label><br>
        <label>Background Color:</label>
        <input type="color" name="tab_background_color"><br>
        <label>Border Color:</label>
        <input type="color" name="tab_border_color"><br>
        <label>Border Width:</label>
        <input type="number" name="tab_border_width"> px<br>
        <label>Padding:</label>
        <input type="number" name="tab_padding"> px<br>
        <label>Margin:</label>
        <input type="number" name="tab_margin"> px<br>
        <label>Font Color:</label>
        <input type="color" name="tab_font_color"><br>
        <label>Font Size:</label>
        <input type="number" name="tab_font_size"> px<br>
        <label>Font Weight:</label>
        <input type="number" name="tab_font_weight"><br>
        <label>Text Transform:</label>
        <select name="tab_text_transform">
          <option value="none">None</option>
          <option value="uppercase">Uppercase</option>
          <option value="lowercase">Lowercase</option>
          <option value="capitalize">Capitalize</option>
        </select><br>
        <label>Text Decoration:</label>
<select name="tab_text_decoration">
  <option value="none">None</option>
  <option value="underline">Underline</option>
  <option value="overline">Overline</option>
  <option value="line-through">Line-through</option>
  <option value="underline overline">Underline Overline</option>
</select><br>


</div>
</div>

</div>
<br>
        <button type="submit" name="save_theme">Save Theme</button><br>                
                

<!-- Implement the tab content for Text -->



<!-- Add JavaScript to handle tab switching -->
<script>
    function openTab(evt, tabName) {
        // Declare variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab and add an "active" class to the button that opened the tab
        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>