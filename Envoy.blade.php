@servers(['localhost' => '127.0.0.1', 'web' => '-A simplificando1@simplificando.com.br'])

@setup
    $repo    = 'git@github.com:knewitzgui/Simplificando.git';
    $base    = '/home/simplificando1/apps/guilherme';
    $branch  = $branch ?? "master";
    $path    = '/home/simplificando1/apps/guilherme/repo/'.$branch.'/Simplificando';
    $now     = new DateTime();
    $date    = $now->format('YmdHis');
    $env     = $env ?? 'production';
    $path    = rtrim($path, '/');
    $release = $path.'/'.$date;
    $phpbin = 'php72'; // pra locaweb, coloca php71. Pq por padrao eles usam a 5.3
@endsetup

@task('generate-ssh-key', ['on' => 'web'])
    ssh-keygen -f id_rsa -t rsa -N ''
@endtask

@macro('deploy')
    run_deploy
    hour
@endmacro

@task('test', ['on' => 'localhost'])
    phpunit
@endtask

@task('verify_composer', ['on' => 'web'])
    [ ! -d {{ $base }}/composer ] && mkdir {{ $base }}/composer; cd {{ $base }}/composer; {{ $phpbin }} -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"; {{ $phpbin }} composer-setup.php;
@endtask

@task('run_deploy', ['on' => 'web'])
    cd {{ $path }};
    git pull;
    echo "Repository updated";
    {{ $phpbin }} {{ $base }}/composer/composer.phar install --no-interaction --no-dev --prefer-dist --ignore-platform-reqs;
    {{ $phpbin }} artisan config:cache;
    {{ $phpbin }} artisan optimize;
    {{ $phpbin }} artisan asset:dist;
@endtask

@task('assets', ['on' => 'web'])
    cd {{ $release }};
@endtask

@task('finalize', ['on' => 'web'])
    {{-- curl -X POST -H 'Content-type: application/json' --data '{"text":"Deployment to production completed"}' https://hooks.slack.com/services/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 --}}
@endtask


@task('hour', ['on' => 'localhost'])
    echo "Deploy finalizado em {{ date('d/m/Y H:i:s') }}"
@endtask
