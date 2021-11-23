<?php

namespace ContribStats\ContribParser;

class ContribParser
{

    public static function parse()
    {
        $mappings = [
            'ryan.szrama' => 'rszrama',
            'damz' => 'Damien Tournoud',
            'damien' => 'Damien Tournoud',
            'pedro.cambra' => 'pcambra',
            'andy' => 'andyg5000',
            'nmd.matt' => 'mglaman',
            'amateescue' => 'amateescu',
            'torgospizza' => 'torgosPizza',
            'rszrama et al' => 'rszrama',
            'redben in http' => 'redben',
            'my.baileys' => 'mr.baileys',
            'GoZOo' => 'GoZ',
            'pasi.kauraniemi' => 'mitrpaka',
            'mikeNCM' => 'mlutz',
        ];
        $projects = [
        'commerce' => [
            'repo' => 'https://git.drupal.org/project/commerce.git',
            'branch' => '8.x-2.x',
        ],
        'commerce_shipping' => [
            'repo' => 'https://git.drupal.org/project/commerce_shipping.git',
            'branch' => '8.x-2.x',
        ],
        ];
        ContribParser::EnsureRepos($projects);

        $range = '--since="2017-01-01 00:00:00" --until="2017-12-31 23:59:59"';
        foreach ($projects as $project_name => $project) {
            $contributors = [];
            $commits = [];
            exec('git -C projects/' . $project_name . ' log --format="%ae||%s" --no-merges ' . $range, $commits);
            foreach ($commits as $key => $commit) {
                list($author, $subject) = explode("||", $commit);
                $matches = [];
                if (preg_match('/by (\w+\,?.*?):/', $subject, $matches)) {
                    foreach (explode(', ', $matches[1]) as $user) {
                        $user = isset($mappings[$user]) ? $mappings[$user] : $user;
                        if (!isset($contributors[$user])) {
                            $contributors[$user] = 0;
                        }
                        $contributors[$user] += 1;
                    }
                    continue;
                }

                // The commit message isn't formatted with attribution.
                $author = explode('@', $author);
                $author = $mappings[$author[0]] ?? $author[0];
                if (!isset($contributors[$author])) {
                    $contributors[$author] = 0;
                }
                $contributors[$author] += 1;
            }

            unset($contributors['git']);
            arsort($contributors);
            print json_encode([
                'project' => $project_name . ' ' . $project['branch'],
                'total_contributors' => count($contributors),
                'total_commits' => count($commits),
                'contributors' => $contributors,
            ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        }
    }

    static function ensureRepos(array $projects)
    {
        if (!is_dir('projects')) {
            mkdir('projects');
        }

        foreach ($projects as $project_name => $project) {
            $project_path = 'projects/' . $project_name;
            if (is_dir($project_path)) {
                exec('git -C ' . $project_path . ' checkout ' . $project['branch']);
                exec('git -C ' . $project_path . ' pull origin ' . $project['branch']);
                continue;
            }

            exec('git clone --branch ' . $project['branch'] . ' ' . $project['repo'] . ' ' . $project_path);
        }
    }
}
