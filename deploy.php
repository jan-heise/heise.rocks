<?php

namespace Deployer;

require 'recipe/laravel.php';

import(file: '.hosts.yml');

// Config

set('repository', 'git@github.com:jan-heise/heise.rocks.git');

add('shared_files', ['.env']);
add('shared_dirs', []);
add('writable_dirs', []);

// Hooks

set('rsync', [
    'exclude' => array_merge(
        get('shared_files'),
        get('shared_dirs'),
    ),
    'exclude-file' => false,
    'include' => [],
    'include-file' => false,
    'filter' => [],
    'filter-file' => false,
    'filter-perdir' => false,
    'flags' => 'az',
    'options' => ['delete'],
    'timeout' => 120,
]);
set(name: 'rsync_src', value: '.build');

task('failed', [
    'deploy:unlock',
]);

desc(title: 'Deploy your project');
task('deploy', [
    'deploy:prepare',
    'deploy:vendors',
    'artisan:storage:link',
    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',
    'deploy:publish',
]);

after(task: 'deploy:failed', do: 'failed');
