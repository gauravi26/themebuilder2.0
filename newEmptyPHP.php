<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$facultyModels = Faculty::model()->findAllByAttributes(array('course_id' => 4));

foreach ($facultyModels as $facultyModel) {
    // Fetch the theme ID for the current column from the mapping table
    $column_name = 'faculty_name'; // Change this to the current column name
    $mappingModel = FacultyColumnThemeMapping::model()->findByAttributes(array('column_name' => $column_name));
    $theme_ID = $mappingModel->theme_ID;

    // Fetch the theme details from the themes table using the theme ID
    $themeModel = Themes::model()->findByPk($theme_ID);
    $css_properties = "color: " . $themeModel->color . ";";
    $css_properties .= "font-size: " . $themeModel->font_size . ";";
    $css_properties .= "background-color: " . $themeModel->background_color . ";";
    $css_properties .= "padding: " . $themeModel->padding . ";";
    $css_properties .= "margin: " . $themeModel->margin . ";";
    $css_properties .= "border: " . $themeModel->border . ";";
    $css_properties .= "text-align: " . $themeModel->text_align . ";";
    $css_properties .= "text-shadow: " . $themeModel->text_shadow . ";";
    $css_properties .= "text-indent: " . $themeModel->text_indent . ";";
    $css_properties .= "letter-spacing: " . $themeModel->letter_spacing . ";";
    $css_properties .= "word-spacing: " . $themeModel->word_spacing . ";";
    $css_properties .= "line-height: " . $themeModel->line_height . ";";
    $css_properties .= "text-transform: " . $themeModel->text_transform . ";";
    $css_properties .= "text-decoration: " . $themeModel->text_decoration . ";";
    $css_properties .= "font-family: " . $themeModel->font_family . ";";
    $css_properties .= "font-weight: " . $themeModel->font_weight . ";";
    $css_properties .= "text-overflow: " . $themeModel->text_overflow . ";";
    $css_properties .= "white-space: " . $themeModel->white_space . ";";
    $css_properties .= "text-orientation: " . $themeModel->text_orientation . ";";
    $css_properties .= "text-wrap: " . $themeModel->text_wrap . ";";
    $css_properties .= "text-justify: " . $themeModel->text_justify . ";";
    $css_properties .= "text-emphasis: " . $themeModel->text_emphasis . ";";
    $css_properties .= "text-spacing: " . $themeModel->text_spacing . ";";
    $css_properties .= "text-shadow-color: " . $themeModel->text_shadow_color . ";";
    $css_properties .= "text-shadow-x: " . $themeModel->text_shadow_x . ";";
    $css_properties .= "text-shadow-y: " . $themeModel->text_shadow_y . ";";
    // Add more CSS properties as needed

    // Apply the theme CSS properties to the current column
    echo '<div style="' . $css_properties . '">' . $facultyModel->faculty_name . '</div>';
}
