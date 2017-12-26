<?php

// We parse the HTML view because the REST endpoint has no obvious way
// to filter by core version.
$html = file_get_contents('https://www.drupal.org/project/project_module/index?project-status=full&drupal_core=7234');
$doc = new DOMDocument();
@$doc->loadHTML($html);
$elements = $doc->getElementsByTagName('span');
$modules = [];
foreach ($elements as $element) {
  if (strpos(strtolower($element->nodeValue), 'commerce') !== FALSE) {
  	$modules[$element->nodeValue] = $element->firstChild->getAttribute('href');
  }
}
print count($modules) . ' modules:' . PHP_EOL;
print json_encode($modules,  JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);