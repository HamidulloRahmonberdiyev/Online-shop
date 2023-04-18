<x-layouts.backend.home>

    <x-slot:title>
       {{ __('Asosiy') }}
    </x-slot:title>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Panel') }}</div>

                <div class="card-body">
                    @if (Auth::user()->role_id > 1)
                        <div class="alert alert-success" role="alert">
                            Tizimga muvaffaqiyatli kiritildingiz
                        </div>
                    @else
                        <div class="alert alert-danger" role="alert">
                            You are not Admin
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

</x-layouts.backend.home>

