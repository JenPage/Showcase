<?php
$composerFile = file_get_contents('./test-project/composer.json');
$composer = json_decode($composerFile, true);
// $composer['require']["brokerexchange/showcase"] = "dev-feature/1.0";
// var_dump($composer);
$composer['repositories'] = json_decode('[
        {
            "type": "path",
            "url": "../package",
            "options": {
                "symlink": true
            }
        }
    ]');
$composer['minimum-stability'] = "dev";
file_put_contents('./test-project/composer.json', json_encode($composer));