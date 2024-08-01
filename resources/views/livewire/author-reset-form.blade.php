<div>
    <!-- {{-- Because she competes with no one, no one can compete with her. --}} -->
        @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{!! Session::get('fail') !!}}
            </div>
        @endif

        @if(Session::get('success'))
            <div class="alert alert-danger">
                {{!! Session::get('success') !!}}
            </div>
        @endif

        <form action="./"  method="post" wire:submit.prevent="ResetHandler()" autocomplete="off" >
            <div class="card card-md">
            <div class="card-body">
                <h2 class="h2 text-center mb-4">{{ __('Reset password') }}</h2>

                <div class="mb-3">
                    <label class="form-label">{{ __('Email') }}</label>
                    <input type="text" class="form-control" placeholder="{{ __('Enter email address') }}" wire:model="email" disabled >
                    <span class="text-danger"> @error('email')  {{ $message ?? null }}  @enderror  </span>
                </div>
                <div class="mb-2">
                    <label class="form-label">
                    {{ __('New Password') }}
                    </label>
                    <div class="input-group input-group-flat">
                    <input type="password" class="form-control" id="id_password" placeholder="{{ __('New Password') }}" wire:model="new_password" >
                    <span class="input-group-text">
                        <!-- <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password">Download SVG icon from http://tabler-icons.io/i/eye -->
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg> -->
                        <!-- </a> -->
                        <i class="ti ti-eye" id="togglePassword"></i>
                    </span>
                    </div>
                </div>
                <span class="text-danger"> @error('new_password')  {{ $message ?? null }}  @enderror  </span>

                <div class="mb-2">
                    <label class="form-label">
                    {{ __('Confirm Password') }}
                    </label>
                    <div class="input-group input-group-flat">
                    <input type="password" class="form-control" id="id_password_confirm" placeholder="{{ __('Confirm Password') }}" autocomplete="off" wire:model="confirm_new_password">
                    <span class="input-group-text">
                        <!-- <a href="#" class="link-secondary" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password">Download SVG icon from http://tabler-icons.io/i/eye -->
                        <!-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg> -->
                        <!-- </a> -->
                        <i class="ti ti-eye" id="togglePassword_confirm"></i>
                    </span>
                    </div>
                </div>
                <span class="text-danger"> @error('confirm_new_password')  {{ $message ?? null }}  @enderror  </span>

                <div class="mb-2">
                    <label class="form-check">
                        <a href="{{ route('author.login') }}" >{{ __('Back to login page') }}</a>
                    </label>
                </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100">{{ __('Reset password') }}</button>
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
            // toggle the eye slash icon - using tabler icons
            this.classList.toggle('ti-eye-off');
        });

        const togglePassword_confirm = document.querySelector('#togglePassword_confirm');
        const password_confirm = document.querySelector('#id_password_confirm');

        togglePassword_confirm.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password_confirm.getAttribute('type') === 'password' ? 'text' : 'password';
            password_confirm.setAttribute('type', type);
            // toggle the eye slash icon - using tabler icons
            this.classList.toggle('ti-eye-off');
        });
    </script>
@endpush