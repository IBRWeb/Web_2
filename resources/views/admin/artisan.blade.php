{{ \SleepingOwl\Admin\AssetManager\AssetManager::addStyle('assets/css/dashboard.css') }}

<div class="row">

    <div class="col-md-4">
        <a href="{{ route('admin.artisan', ['command' => 'migrate']) }}" class="btn btn-primary btn-lg">Migrate Databases</a>
    </div>

</div>