<div>
    <!-- {{-- Success is as dangerous as failure. --}} -->
    <form method="post" wire:submit.prevent="UpdateDetails()">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="example-text-input" placeholder="{{ __('Name') }}" wire:model='name'>
                <span class="text-danger"> @error('name') {{ $message ?? null}} @enderror </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label">{{ __('Username') }}</label>
                <input type="text" class="form-control" name="example-text-input" placeholder="{{ __('username') }}" wire:model='username'>
                <span class="text-danger"> @error('username') {{ $message ?? null}} @enderror </span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mb-3">
                <label class="form-label">{{ __('Email') }}</label>
                <input type="text" class="form-control" name="example-text-input" placeholder="{{ __('Email') }}" disable wire:model='email'>
                <span class="text-danger"> @error('email') {{ $message ?? null}} @enderror </span>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">{{ __('Biography') }}</label>
            <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="{{ __('Content...') }}" wire:model='biography'>Biography...
            </textarea>
        </div>
        <button type="submit" class="btn btn-primary" >{{ __('Save changes') }}</button>
    </form>
</div>
