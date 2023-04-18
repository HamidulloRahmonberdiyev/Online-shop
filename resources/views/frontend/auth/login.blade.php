<x-layouts.frontend.main>

    <x-slot:title>
       {{ __('Kirish') }}
    </x-slot:title>

    <div class="container-fluid">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{ __('Kirish') }}</span></h2>
        <div class="row px-xl-5">
            <div class="col-lg-6 mb-5">
                <div class="contact-form bg-light p-30 mb-5">
                    <div id="success"></div>
                    <form action="{{ route('front.authenticate') }}" method="POST">
                        @csrf

                        <div class="control-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('Email kiriting') }}">
                            <p class="help-block text-danger"></p>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        
                        <div class="control-group">
                            <input type="password" name="password" class="form-control" placeholder="{{ __('Parol kiriting') }}">
                            <p class="help-block text-danger"></p>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">{{ __('Yuborish') }}</button>
                        </div>
                    </form>
                </div>
                <div class="text-center">
                    <h4><b>{{ __('Siz ro\'yhatdan o\'tmaganmisiz?') }} <a href="{{ route('front.register')}}">{{ __('Ro\'yhatdan o\'tish') }}</a></b></h4>
                </div>
            </div>
        </div>
    </div>

</x-layouts.frontend.main>