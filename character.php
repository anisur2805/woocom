<?php
get_header();

$character_slug = get_query_var('character');
$results = json_decode(file_get_contents( get_template_directory(). "/data/{$character_slug}.json"));

echo '<h1>About: '. $results->name.'</h1>';
echo "<p>{$results->description}</p>";

get_footer();