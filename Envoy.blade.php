@setup

$repo = 'git@github.com:IdoLeybo/Epicure.git';
$branch = $branch = isset($branch) ? $branch : "main";

date_default_timezone_set('Europe/Berlin');
$deploy_date = date('YmdHis');

$theme_dir = 'web/app/themes/epicure';
$appDir = '/var/www/html';
$baseDir = '/home/ubuntu';
$releasesDir = '/home/ubuntu/releases';
$release = 'release_' . $deploy_date;

$newReleaseDir = "{$releasesDir}/{$deploy_date}";
$serve = $appDir . '/current';

$global_uploads_dir = '/home/ubuntu/uploads';
$shared_drive = '/home/ubuntu/epicure-prod/';
$app_uploads_dir = $app_dir . '/web/app/uploads';

$servers = ['local' => '127.0.0.1', 'prod1' => 'ubuntu@54.211.82.235', 'prod2' => 'ubuntu@3.84.241.33'];

if( $target === 'prod1' || $target === 'prod2'){
echo 'Deploy to production';
$global_uploads_dir = $shared_drive . 'uploads';
}

if (!isset($branch)){
$branch = 'develop';
}

@endsetup

@servers($servers)


@story('deploy')
    upload_compiled_assets
    clone_repo
    install
    deployment_cleanup
@endstory

@task('upload_compiled_assets', ['on' => 'local'])
echo "Start local..."
cd {{ $theme_dir }}
{{--npm run production--}}
tar -czf assets-{{ $release }}.tar.gz dist
scp assets-{{  $release }}.tar.gz {{ $servers[$target] }}:~
rm -rf assets-{{  $release }}.tar.gz

wp plugin list --format=json > ./plugins-export.json
scp ./plugins-export.json {{ $servers[$target] }}:~
rm ./plugins-export.json
@endtask

@task('clone_repo', [ 'on' => $target ])
    [ -d {{ $releasesDir }} ] || sudo mkdir {{ $releasesDir }};
    sudo chmod 777 {{ $releasesDir }}
    cd {{ $releasesDir }};
    echo "Deployment ({{ $deploy_date }}) started";
    git clone --single-branch -b  {{$branch}} {{ $repo }} {{ $release }};
    echo "Repository cloned";
@endtask



@task('install', [ 'on' => $target ])
echo "Install starting..."
    cd {{ $releasesDir }}/{{ $release }};
    cp ~/.env .
    composer install --no-dev;
    echo "Install finished"
@endtask


@task('deployment_cleanup', [ 'on' => $target ])
    echo 'Installing compiled assets...'
    cd ~
    tar -xzf assets-{{ $release }}.tar.gz -C {{ $releasesDir }}/{{ $release }}/{{ $theme_dir }}
    sudo rm -r assets-{{ $release }}.tar.gz

    echo 'Setting permissions...'

    cd {{ $releasesDir }};
    sudo chmod -R ug+rwx {{ $release }};
    sudo chgrp -R www-data {{ $release }};

    echo 'Updating symlinks...'
    sudo ln -n -f -s {{ $releasesDir }}/{{ $release }}/* /var/www/html
{{--    sudo rm -r {{ $app_uploads_dir }}--}}
{{--    sudo ln -s {{$global_uploads_dir}} {{$app_uploads_dir}}--}}

    echo 'Deployment to {{$target}} finished successfully.'
@endtask


