<?php

function add_ahrefs_verification_meta()
{
  echo '<meta name="ahrefs-site-verification" content="e05760c95c9bbd859b594f1e26f914167ca78fb886fb657461df0c853ded7fca">' . "\n";
}
add_action('wp_head', 'add_ahrefs_verification_meta');


add_filter('post_class', function ($classes) {
  if (is_home() || is_page('blog')) {
    $classes = array_diff($classes, ['hentry']);
  }
  return $classes;
});

add_filter('rank_math/json_ld', function ($data) {

  if (is_home() || is_page('blog')) {
    foreach ($data as $key => $schema) {
      if (isset($schema['@type']) && $schema['@type'] === 'CollectionPage') {
        unset($data[$key]);
      }
    }
  }
  return $data;
}, 99);
// Custom Schema from ACF field //
add_action('wp_head', 'epos_add_schema_from_acf');
function epos_add_schema_from_acf()
{

  if (!is_singular()) {
    return;
  }

  $schema = get_field('schema_json');

  if (empty($schema)) {
    return;
  }

  $replacements = [
    '{{url}}'   => esc_url(get_permalink()),
    '{{title}}' => esc_js(get_the_title()),
  ];

  $schema = str_replace(
    array_keys($replacements),
    array_values($replacements),
    $schema
  );

  echo '<script type="application/ld+json" class="epos-schema">';
  echo wp_kses_post($schema);
  echo '</script>';
}
