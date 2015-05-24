        <div class="form-group">

            {!! Form::label($name, $label) !!}


            @if($error)
                <p class="error_message icon-error-circle">{{ $error }}</p>
            @endif

            {!! $control !!}

        </div>
