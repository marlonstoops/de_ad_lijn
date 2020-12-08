<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'adlijn.be');

// Project repository
set('repository', 'git@github.com:marlonstoops/de_ad_lijn.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);

// Hosts
host('ssh.adlijn.be')
    ->set('deploy_path', '~/webroot/ROOT/adlijn.be');

// Tasks
task('build', function () {
    run('cd {{release_path}} && npm install && npm run prod');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
