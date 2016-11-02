@setup
	$branch = "master";
	$directory = "stoneworking";
@endsetup

@servers(['web' => 'stone@104.131.162.79'])

@task('list', ['on' => 'web'])
	cd {{ $directory }}
    ls -l --group-directories-first
@endtask

@task('migrate', ['on' => 'web'])
	cd stoneworking
    php artisan migrate
@endtask

@task('seed', ['on' => 'web'])
	cd stoneworking
    php artisan db:seed
@endtask

@task('seed-table', ['on' => 'web'])
	cd stoneworking
    php artisan db:seed --class={{ $table or null }}
@endtask

@task('deploy', ['on' => 'web'])
	cd stoneworking
    git pull origin {{ $branch }}
@endtask