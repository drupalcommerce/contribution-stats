<?php

namespace ContribStats\ListContrib;

class ListContrib
{

    public static function get()
    {
        $args = getopt("o::", ['output-format::']);

        // We parse the HTML view because the REST endpoint has no obvious way
        // to filter by core version.
        $client = new \GuzzleHttp\Client();

        $response = $client->get('https://www.drupal.org/project/project_module/index?project-status=full&drupal_core=7234');

        $html = $response->getBody();

        $doc = new \DOMDocument();
        @$doc->loadHTML($html);
        $elements = $doc->getElementsByTagName('span');
        $modules = [];

        foreach ($elements as $element) {
            if (strpos(strtolower($element->nodeValue), 'commerce') !== false) {
                $modules[$element->nodeValue] = $element->firstChild->getAttribute('href');
            }
        }

        $output_format = 'text';
        if (isset($args['o']) || isset($args['output-format'])) {
            $output_format = isset($args['o']) ? $args['o'] : $args['output-format'];
        }

        switch ($output_format) {
            case 'json':
                print json_encode(
                    $modules,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
                );
                break;
            case 'text':
                print_r($modules);
                print 'Total Modules: ' . count($modules) . PHP_EOL;
                break;
            default:
                print 'The output format you specified is not valid';
        }
    }
}
