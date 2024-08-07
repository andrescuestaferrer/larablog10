
<div class="row align-self-end m-2"  >  <!-- style="border-style: solid;" -->
    <?php  $available_locales = config('app.available_locales'); $current_locale = config('app.locale'); ?>
    <?php  $available_flags = config('app.available_flags');  $current_flag = $available_flags["$current_locale"]; ?>

    <div class="col-10" >
        <select class="form-select"  id="changeLang">   
        @foreach($available_locales as $locale_name => $available_locale)
            @if($available_locale === $current_locale)
                <option value="{{ $available_locale }}"  selected > {{ __($locale_name) }}  </option> 
            @else
                <option value="{{ $available_locale }}" > {{ __($locale_name) }} </option>
            @endif
        @endforeach
        </select>
    </div>
    <div class="col-2">
        <span class="fi fi-<?php echo $current_flag;?>"></span>
    </div>
</div>

@push('scripts')
    <script>
        $('#changeLang').on('change', function(e) {
            var url = "{{ route('changeLang') }}";
            lang_id = document.getElementById("changeLang").value;
            window.location.href = url + "?lang="+ lang_id;
        });
    </script>
@endpush