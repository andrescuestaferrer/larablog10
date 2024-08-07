<div>
    <!-- {{-- Because she competes with no one, no one can compete with her. --}} -->
    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif

    @if(Session::get('success'))
        <div class="alert alert-success">
            {!! Session::get('success') !!}
        </div>
    @endif

    <form action="./" wire:submit.pretend="LoginHandler()" method="post" autocomplete="off" novalidate="">
        <div class="card card-md">
        <div class="card-body">
            <h2 class="h2 text-center mb-4">{{ __('Login to your account') }}</h2>

            <div class="mb-3">
                <label class="form-label">{{ __('Email address or username') }}</label>
                <input type="text" class="form-control" placeholder="{{ __('Email or username') }}" autocomplete="off" wire:model="login_id">
                @error('login_id')
                    <span class="text-danger">{{ $message ?? null }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label">
                {{ __('Password') }}
                <span class="form-label-description">
                    <a href="{{ route('author.forgot-password') }}">{{ __('I forgot password') }}</a>
                </span>
                </label>
                <div class="input-group input-group-flat">
                <input type="password" class="form-control" id="id_password" placeholder="{{ __('Your password') }}" autocomplete="off" wire:model="password">
                <span class="input-group-text">
                    <!-- <a href="#" class="link-secondary" id="togglePassword" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password">Download SVG icon from http://tabler-icons.io/i/eye -->
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg> -->
                    <!-- </a> -->
                    <i class="ti ti-eye" id="togglePassword"></i>
                </span>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message ?? null }}</span>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-check">
                <input type="checkbox" class="form-check-input">
                <span class="form-check-label">{{ __('Remember me on this device') }}</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">{{ __('Sign in') }}</button>
            </div>

        </div>
        </div>
    </form>
</div>
@push('scripts')
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon  - using tabler icons
            this.classList.toggle('ti-eye-off');
        });
    </script>
@endpush