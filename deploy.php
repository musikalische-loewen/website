<?php

namespace Deployer;

require 'recipe/laravel.php';

set('application', 'loewen');
set('deploy_path', '~/webapps/{{application}}');
set('repository', getenv('CI_REPOSITORY_URL'));

host('production')
    ->set('hostname', getenv('DEPLOYMENT_HOST'))
    ->set('remote_user', getenv('DEPLOYMENT_USER'))
    ->set('deploy_path', '~/webapps/{{application}}')
    ->set('bin/php', '/RunCloud/Packages/php83rc/bin/php');

task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:down',
    'artisan:migrate',
    'artisan:up',
    'custom:upload',
    'deploy:publish',
]);

task('custom:upload', function () {
    upload(__DIR__ . "/public/css", '{{release_path}}/public');
    upload(__DIR__ . "/public/js", '{{release_path}}/public');
    upload(__DIR__ . "/public/fonts", '{{release_path}}/public');
    upload(__DIR__ . "/public/mix-manifest.json", '{{release_path}}/public');
});

after('deploy:failed', 'deploy:unlock');
