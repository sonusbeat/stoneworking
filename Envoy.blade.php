@setup
	$branch = "master";
	$directory = "stoneworking";
@endsetup

@servers(['web' => 'stone@104.131.162.79'])

@task('list', ['on' => 'web'])
	cd {{ $directory }}
    ls -l --group-directories-first
@endtask

@task('deploy', ['on' => 'web'])
	cd stoneworking
    git pull origin {{ $branch }}
@endtask