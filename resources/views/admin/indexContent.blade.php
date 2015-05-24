{{ \SleepingOwl\Admin\AssetManager\AssetManager::addStyle('assets/css/dashboard.css') }}

<div class="row">

    @foreach($models as $model)

        <div >
            <a href="{{ $model->displayUrl() }}">{{ $model->title()}}</a>
        </div>

    @endforeach

</div>