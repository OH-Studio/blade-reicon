<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$version = trim(file_get_contents("{$root}/.reicon-version"));

// Reicon generates all its packages from this dataset, so reading it directly keeps the canonical names and markup.
$data = json_decode(
    file_get_contents("https://raw.githubusercontent.com/dqev/reicon/{$version}/data/icon-data.json"),
    true,
    flags: JSON_THROW_ON_ERROR,
);

foreach (['outline', 'solid'] as $weight) {
    if (! is_dir("{$root}/dist/{$weight}")) {
        mkdir("{$root}/dist/{$weight}", recursive: true);
    }

    array_map(unlink(...), glob("{$root}/dist/{$weight}/*.svg"));
}

$toSvg = fn (string $code): string => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">'.$code.'</svg>';

$exported = [];

foreach ($data['categories'] as $category => ['icons' => $icons]) {
    foreach ($icons as $name => $icon) {
        // Some names repeat across categories; like Reicon's npm packages, later occurrences get the category as a suffix.
        $filename = isset($exported[$name]) ? "{$name}-{$category}" : $name;
        $exported[$filename] = true;

        $outline = $icon['weights']['Outline']['code'];
        $solid = $icon['weights']['Filled']['code'] ?? $outline;

        file_put_contents("{$root}/dist/outline/{$filename}.svg", $toSvg($outline));

        if ($solid !== $outline) {
            file_put_contents("{$root}/dist/solid/{$filename}.svg", $toSvg($solid));
        }
    }
}

echo 'Exported '.count($exported)." icons from Reicon {$version}.".PHP_EOL;
