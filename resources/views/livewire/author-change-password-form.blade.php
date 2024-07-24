<div>
    <!-- {{-- Nothing in the world is as soft and yielding as water. --}} -->
    <form method="post" wire:submit.prevent="changePassword()" >
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">{{ __('Current Password') }}</label>
                    <input type="password" class="form-control" name="example-text-input" placeholder="{{ __('Current Password') }}" wire:model='current_password'>
                    <span class="text-danger"> @error('current_password') {{ $message ?? null}} @enderror </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">{{ __('New Password') }}</label>
                    <input type="password" class="form-control" name="example-text-input" placeholder="{{ __('New Password') }}"
                    wire:model='new_password'>
                    <span class="text-danger"> @error('new_password') {{ $message ?? null}} @enderror </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                    <label class="form-label">{{ __('Confirm new Password') }}</label>
                    <input type="password" class="form-control" name="example-text-input" placeholder="{{ __('Retype new password') }}"
                    wire:model='confirm_new_password'>
                    <span class="text-danger"> @error('confirm_new_password') {{ $message ?? null}} @enderror </span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Change password</button>
    </form>   
</div>
