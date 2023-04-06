<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/php-fpm.php';
require 'contrib/npm.php';

// Config

set('repository', 'git@github.com:otim22/loan-management.git');
set('php_fpm_version', '8.1');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('prod')
    ->set('remote_user', 'root')
    ->set('identity_file', '~/.ssh/id_xxxxxxx')
    ->set('branch', 'main')
    ->set('hostname', 'xxx.xxx.xxx.xxx')
    ->set('deploy_path', '/var/www/loan_management');

// Hooks

task('prod', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:view:cache',
    'artisan:config:clear',
    'artisan:config:cache',
    'artisan:migrate',
    'composer:install',
    'npm:install',
    'artisan:optimize',
    'npm:run:prod',
    'deploy:publish',
    'php-fpm:reload',
]);

task('composer:install', function () {
    cd('{{release_or_current_path}}');
    run('composer install');
});

task('npm:run:prod', function () {
    cd('{{release_or_current_path}}');
    run('npm run prod');
});

after('deploy:failed', 'deploy:unlock');
