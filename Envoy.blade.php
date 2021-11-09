@setup

$repo = 'git@github.com:IdoLeybo/Epicure.git';
$branch = $branch = isset($branch) ? $branch : "main";

date_default_timezone_set('Europe/Berlin');
$deploy_date = date('YmdHis');

$theme_dir = 'web/app/themes/epicure';
$appDir = '/var/www/html';
$baseDir = '/home/ubuntu';
$releasesDir = '/home/ubuntu/releases';

$newReleaseDir = "{$releasesDir}/{$deploy_date}";
$release = 'release_' . $deploy_date;

$serve = $appDir . '/current';

$servers = ['local' => '127.0.0.1', 'prod1' => 'ubuntu@54.211.82.235'];

if( $target === 'prod1'){
echo 'Deploy to production';
$global_uploads_dir = $shared_drive . 'uploads';
}

if (!isset($branch)){
$branch = 'develop';
}

@endsetup

@servers($servers)



@story('deploy-local', ['on' => $target])
    dir
@endstory


@story('deploy')
    upload_compiled_assets
    clone_repo
    install
    deployment_cleanup
@endstory

@task('upload_compiled_assets', ['on' => 'local'])
cd {{ $theme_dir }}
{{--npm run production--}}
tar -czf assets-{{ $release }}.tar.gz dist
scp assets-{{  $release }}.tar.gz {{ $servers[$target] }}:~
{{--scp ./build/version-hash.txt {{ $servers[$target] }}:~--}}
rm -rf assets-{{  $release }}.tar.gz

{{--wp plugin list --format=json > ./plugins-export.json--}}
{{--scp ./plugins-export.json {{ $servers[$target] }}:~--}}
{{--rm ./plugins-export.json--}}
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
    cd releases/{{ $release }};
    cp ~/.env .
{{--    composer init--}}
    composer install --no-dev;
    echo "Install finished"
@endtask

@task('deployment_cleanup', [ 'on' => $target ])
    echo 'Installing compiled assets...'
    cd ~
{{--    tar -xzf assets-{{ $release }}.tar.gz -C {{ $release_dir }}/{{ $release }}--}}
    {{--/{{ $theme_dir }}--}}
    sudo rm -r assets-{{ $release }}.tar.gz

    echo 'Updating symlinks...'
    sudo ln -nfs {{ $release_dir }}/{{ $release }} {{ $app_dir }}

    echo 'Deployment to {{$target}} finished successfully.'
@endtask


