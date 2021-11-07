@setup


$repo = 'git@github.com:IdoLeybo/Epicure.git';
$branch = $branch = isset($branch) ? $branch : "main";
date_default_timezone_set('Europe/Berlin');
$deploy_date = date('YmdHis');
$appDir = '/var/www/html';
$baseDir = '/home/ubuntu';
$releasesDir = '/home/ubuntu/releases';
$newReleaseName = date('Ymd-His');
$newReleaseDir = "{$releasesDir}/{$newReleaseName}";
$release = 'release_' . $deploy_date;

$serve = $appDir . '/current';

@endsetup

@servers(['local' => '127.0.0.1', 'production' => ['ubuntu@3.85.61.83']])

@task('dir')
mkdir "envoy-test"
@endtask




@task('clone_git')

[ -d {{ $releasesDir }} ] || sudo mkdir {{ $releasesDir }};
cd {{ $releasesDir }};
echo "Deployment ({{ $date }}) started";
git clone --single-branch -b  {{$branch}} {{ $repo }} {{ $release }};
echo "Repository cloned";
{{--[ -d {{ $releasesDir }} ] || sudo mkdir {{ $releasesDir }};--}}
{{--cd {{ $releasesDir }};--}}
{{--git clone --single-branch -b  {{$branch}} {{ $repo }} {{ $release }};--}}
@endtask

@story('deploy', ['on' => 'production'])
clone_git
@endstory






@task('install')
@endtask

@task('deployment_cleanup')
@endtask

@story('deploy-local', ['on' => 'local'])
dir
@endstory

