@extends('layouts.app')

@section('content')
    <script>
        window.baseUrl = '<?= config('app.api_base_url') ?>';
        window.baseSanctumCsrfUrl = '<?= config('app.base_sanctum_csrf_url') ?>';
        window.titleLabel = '{{ __('messages.title_label') }}';
        window.actionLabel = '{{ __('messages.action_label') }}';
        window.createLabel = '{{ __('messages.create_label') }}';
        window.editLabel = '{{ __('messages.edit_label') }}';
        window.deleteLabel = '{{ __('messages.delete_label') }}';
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <nav class="nav flex-column">
                        <a class="nav-link" href="/user">Users</a>
                        <a class="nav-link" href="/product">Products</a>
                    </nav>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @yield('component')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
