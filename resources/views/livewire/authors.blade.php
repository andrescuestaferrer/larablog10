<div>
{{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="page-header d-print-none mb-2">
        <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
            <h2 class="page-title">{{ __('Authors') }}</h2>

            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            <div class="d-flex">
                <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user…" wire:model='search'>
                <a href="#" class="btn btn-primary" data-bs-target="#add_author_modal" data-bs-toggle="modal" >
                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                {{ __('New Author') }}
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="row row-cards">

        @forelse ($authors as $author)

            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body p-4 text-center">
                    <span class="avatar avatar-xl mb-3 rounded" style="background-image: url({{$author->picture}})"></span>
                    <h3 class="m-0 mb-1"><a href="#">{{$author->name}}</a></h3>
                    <div class="text-muted">{{$author->email}}</div>
                    <div class="mt-3">
                        <span class="badge bg-purple-lt">{{$author->authorType->name}}</span>
                    </div>
                    </div>
                    <div class="d-flex">
                    <a href="#" class="card-btn" wire:click.prevent='editAuthor({{$author}})'><!-- Download SVG icon from http://tabler-icons.io/i/pencil -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path><path d="M13.5 6.5l4 4"></path></svg>
                        {{ __('Edit') }}</a>

                    <a href="#" class="card-btn" wire:click.prevent='deleteAuthor({{$author}})'><!-- Download SVG icon from http://tabler-icons.io/i/trash -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7l16 0"></path><path d="M10 11l0 6"></path><path d="M14 11l0 6"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path></svg>
                        {{ __('Delete') }}</a>
                    </div>
                </div>
            </div>

        @empty
            <span class="text-danger">{{ __('No author found') }}</span>
        @endforelse
    </div>


    {{-- Modals --}}
    <div wire:ignore.self class="modal modal-blur fade" id="add_author_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __('Add author') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  method="POST" wire:submit.prevent='addAuthor()'>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="{{ __('Enter name') }}" wire:model='name'>
                        <span class="text-danger"> @error('name') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="{{ __('Enter email') }}" wire:model='email'>
                        <span class="text-danger"> @error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Username') }}</label>
                        <input type="text" class="form-control" name="example-text-input" placeholder="{{ __('Enter username') }}" wire:model='username'>
                        <span class="text-danger"> @error('username') {{ $message }} @enderror</span>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">{{ __('Author type') }}</label>
                        <div>
                            <select class="form-select"  wire:model='author_type'>
                                <option value="" selected>-- {{ __('No Selected') }} --</option>
                                @foreach(\App\Models\Type::all() as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <span class="text-danger"> @error('author_type') {{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        <div class="form-label">{{ __('Is direct publisher') }}</div>
                        <div>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="direct_publish" value="0"  wire:model='direct_publish'>
                                <span class="form-check-label">{{ __('Not') }}</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="direct_publish" value="1" wire:model='direct_publish'>
                                <span class="form-check-label">{{ __('Yes') }}</span>
                            </label>
                        </div>
                        <span class="text-danger"> @error('direct_publish') {{ $message }} @enderror</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>

        </div>
        </div>
    </div>

</div>