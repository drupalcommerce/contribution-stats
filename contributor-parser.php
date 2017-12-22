<?php

$git_command = 'git --git-dir=./.git log 8.x-2.x --format="%ae||%s" -s --no-merges --reverse';

$contributors = [];
$commits = [];
$fallback_commits = [];
$regex = [
  'issue' => '/by (\w+\,?.*?):/',

];

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
];

print "Running $git_command\n";
$data = exec($git_command, $commits);

foreach ($commits as $key => $commit) {
  list($author, $subject) = explode("||", $commit);

  $matches = [];
  if (preg_match($regex['issue'], $subject, $matches)) {
    foreach (explode(', ', $matches[1]) as $user) {
      $user = isset($mappings[$user]) ? $mappings[$user] : $user;
      if (!isset($contributors[$user])) {
        $contributors[$user] = 0;
      }
      $contributors[$user] += 1;
    }
  }
  elseif (preg_match("/(\#[0-9]+):/", $subject, $matches)) {
    // The commit message isn't formatted with attribution.
    $author = explode('@', $author);
    $author = isset($mappings[$author[0]]) ? $mappings[$author[0]] : $author[0];
    if (!isset($contributors[$author])) {
      $contributors[$author] = 0;
    }
    $contributors[$author] += 1;
  }
  else {
    // The commit message isn't formatted with attribution.
    $author = explode('@', $author);
    $author = isset($mappings[$author[0]]) ? $mappings[$author[0]] : $author[0];
    if (!isset($contributors[$author])) {
      $contributors[$author] = 0;
    }
    $contributors[$author] += 1;

    $fallback_commits[] = $commit;
  }
}
unset($contributors['git']);
arsort($contributors);
print json_encode([
  'branch' => '7.x-1.x',
  'total' => count($contributors),
  'contributors' => $contributors,
]);
// print_r($fallback_commits);
