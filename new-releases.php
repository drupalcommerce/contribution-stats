<?php

include "vendor/autoload.php";

use PHPHtmlParser\Dom;

$args = getopt("", ['clear-cache', 'limit::', 'last::']);

$last_timestamp = null;
if (isset($args['last'])) {
    $last_timestamp = strtotime("-" . $args['last'] . " day", time());
}

$client = new GuzzleHttp\Client();

$limit = $args['limit'] ?? null;

$modules = json_decode(file_get_contents('module-list.json'));

$dom = new Dom();
$newReleases = [];
foreach ($modules as $name => $module) {
    $machine_name = explode('/', $module)[2];
    $filename = 'cache/' . $machine_name;
    $filename_nid = $filename . '_nid';
    $filename_releases = $filename . '_releases';

  // Load the nid if it doesn't exist or download flag is set.
    if (!file_exists($filename_nid)) {
        $response = $client->get('https://www.drupal.org/api-d7/node.json?field_project_machine_name=' . $machine_name);

        $contents = json_decode($response->getBody())->list[0]->nid;
        file_put_contents($filename_nid, $contents);
    }

    $nid = file_get_contents($filename_nid);

  // Load the release data if it doesn't exist or the download flag is set.
    if (!file_exists($filename_releases)) {
        $response = $client->get('https://www.drupal.org/api-d7/node.json?field_release_project=' . $nid);
        $contents = $response->getBody();
        file_put_contents($filename_releases, $contents);
    }

    $releases = json_decode(file_get_contents($filename_releases))->list;

    foreach ($releases as $release) {
      // Skip anything older than last X days
        if ($last_timestamp && $last_timestamp > $release->created) {
            continue;
        }

        $newReleases[] = [
        'timestamp' => $release->created,
        'name' => $name,
        'url' => 'https://www.drupal.org' . $module,
        'version' => $release->field_release_version,
        'usage' => $release->release_usage ?? 0,
        'description' => $release->field_release_short_description,
        ];
    }
}

usort($newReleases, function ($a, $b) {
    return $b['usage'] <=> $a['usage'];
});

print "| Date| Name | Version | Installs | Description\n";
print "| ---- | --------- | ------- | -------- | ----- |\n";
$i = 0;
foreach ($newReleases as $release) {
    $date = date('F j, Y', $release['timestamp']);
    print "| {$date} | {$release['name']} | {$release['version']} | {$release['usage']} | {$release['description']} |\n";
    $i++;
    if (isset($limit) && $i >= $limit) {
        break;
    }
}
