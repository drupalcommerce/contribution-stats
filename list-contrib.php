<?php

// We parse the HTML view because the REST endpoint has no obvious way
// to filter by core version.
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.drupal.org/project/project_module/index?project-status=full&drupal_core=7234');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.132 Safari/537.36');
$html = curl_exec($ch);

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
