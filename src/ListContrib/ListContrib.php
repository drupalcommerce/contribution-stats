<?php

namespace ContribStats\ListContrib;

class ListContrib
{

    public static function get()
    {
        $args = getopt("o::", ['output-format::']);

        $commerce_modules = [];
        
        // We parse the HTML view because the REST endpoint has no obvious way
        // to filter by core version.
        $client = new \GuzzleHttp\Client();

        $url = 'https://www.drupal.org/api-d7/node.json?type=project_module';
        
        while($url) {
            $response = $client->get($url);
            $data = json_decode($response->getBody());
            
            $url = $data->next ?? null;
            // The next links are broken in the API and we need to fix them manually
            $url = str_replace('node?', 'node.json?', $url);
            $modules = $data->list;

            foreach ($modules as $module) {
                $name = $module->title;
                $machine_name = $module->field_project_machine_name;
                
                // If it isn't a commerce module, we don't care about it.
                if (strpos(strtolower($name), 'commerce') === false) {
                    continue;
                }
                
                $commerce_modules[$name] = $machine_name;
            }
        }

        $output_format = 'text';
        if (isset($args['o']) || isset($args['output-format'])) {
            $output_format = isset($args['o']) ? $args['o'] : $args['output-format'];
        }

        switch ($output_format) {
            case 'json':
                print json_encode(
                    $commerce_modules,
                    JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
                );
                break;
            case 'text':
                print_r($commerce_modules);
                print 'Total Modules: ' . count($commerce_modules) . PHP_EOL;
                break;
            default:
                print 'The output format you specified is not valid';
        }
    }
}
