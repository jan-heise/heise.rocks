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
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:shared',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'deploy:cleanup',
    'deploy:success',
]);

after(task: 'deploy:failed', do: 'failed');
