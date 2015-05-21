<div class="checkbox">

    @if($error)
        <p class="error_message icon-error-circle">{{ $error }}</p>
    @endif

    {!! $control !!}
    {!! Form::label($name, $label) !!}

</div>
