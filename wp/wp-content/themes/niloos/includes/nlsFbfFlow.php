<?php

/**
 * Returns a custom logo, linked to home unless the theme supports removing the link on the home page.
 *
 * @return string Custom logo markup.
 */

// Customizer settings
function add_flow_element_item_section($wp_customize, $panel, $index)
{
  /**
   * Add the new Flow element section
   */
  $section = $wp_customize->add_section('nls_flow_element_' . $index, [
    'title' => __('Flow Element - ', 'nls_fbf') . $index,
    'description' => __('Settings for the flow elements', 'nls_fbf'),
    'panel' => $panel
  ]);

  /**
   * Add the Flow element title
   */
  $wp_customize->add_setting('nls_flow_element_field_title_' . $index, array(
    'default' => '',
    'type' => 'theme_mod',
    'sanitize_callback' => 'our_sanitize_function',
  ));

  /**
   * Add the Flow element title
   */
  $wp_customize->add_control('nls_flow_element_field_title_' . $index, array(
    'label' => __('Title', 'nls_fbf'),
    'section' => $section->id,
    'settings' => 'nls_flow_element_field_title_' . $index,
    'type' => 'text'
  ));

  /**
   * Add the Flow element content
   */
  $wp_customize->add_setting('nls_flow_element_field_content_' . $index, array(
    'default' => '',
    'type' => 'theme_mod',
    'sanitize_callback' => 'our_sanitize_function',
  ));

  /**
   * Add the Flow element content
   */
  $wp_customize->add_control('nls_flow_element_field_content_' . $index, array(
    'label' => __('Content', 'nls_fbf'),
    'section' => $section->id,
    'settings' => 'nls_flow_element_field_content_' . $index,
    'type' => 'text'
  ));
}

function add_flow_elements_general_section($wp_customize, $panel)
{
  /**
   * Add the new Flow section
   */
  $section = $wp_customize->add_section('nls_flow_general', [
    'title' => __('Niloos FBF Flow - General', 'nls_fbf'),
    'description' => __('Settings for the flow elements', 'nls_fbf'),
    'panel' => $panel
  ]);

  /**
   * Add the separator image
   */
  $wp_customize->add_setting('nls_flow_element_separete_image', array(
    'default' => '',
    'type' => 'theme_mod',
  ));

  $wp_customize->add_control(
    new WP_Customize_Image_Control(
      $wp_customize,
      'nls_flow_element_separete_image',
      array(
        'label' => __('Separator Image', 'nls_fbf'),
        'section' => $section->id,
        'settings' => 'nls_flow_element_separete_image',
      )
    )
  );

  /**
   * Add the separator image size
   */
  $wp_customize->add_setting('nls_flow_element_media_image_size', array(
    'default' => 42,
    'type' => 'theme_mod',
  ));

  $wp_customize->add_control('nls_flow_element_media_image_size', array(
    'label' => __('Separetor image width (px)', 'nls_fbf'),
    'section' => 'nls_flow_general',
    'settings' => 'nls_flow_element_media_image_size',
    'type' => 'number'
  ));
}


// [nls-fbf-flow numberElements=""] shortcode
function nls_fbf_flow($atts)
{
  $numberElements = $atts['num'];

  $html = '<section class="hidden md:flex nls-fbf-flow-wrapper relative z-50 items-baseline gap-4 m-auto mx-8">';

  for ($index = 1; $index <= $numberElements; $index++) {
    $title = get_theme_mod('nls_flow_element_field_title_' . $index);
    $imageName = get_theme_mod('nls_flow_element_field_content_' . $index);

    $html .= elementDesign($title, $imageName, $index);
  }

  $html .= '</section>';

  return $html;
}

function elementDesign($title, $imageName, $i)
{
  $html =  '<div class="flow-element-card">';
  $html .= '<p class="flow-element-content">';
  $html .= '<img src="' . get_template_directory_uri() . '/images/svg/' . $imageName . '" alt="" class="inline-block h-12 lg:h-24">';
  $html .= '<span class="' . ($i === 3 ? 'max-w-180' : 'max-w-90 lg:max-w-180') . ' inline-flex mx-2">' .  html_entity_decode($title) . '</span>';
  $html .= '</p>';
  $html .= '</div>';

  return $html;
}

add_shortcode('nls_fbf_flow', 'nls_fbf_flow');
