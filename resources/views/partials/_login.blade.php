<div class="panel panel-primary space-above">
    <div class="panel-body">
        {!! Form::open(['data-parsley-validate' => '', 'route' => 'login']) !!}

            <div class="form-group">
                <div class="profile">
                    {{ Form::label('username', 'Username:') }}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user fa-lg"></i></span>
                        {{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => '',
                        ]) }}  
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="profile">
                    {{ Form::label('password', 'Password:') }}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock fa-lg"></i></span>
                        {{ Form::password('password', ['class' => 'form-control','placeholder' => 'Password', 'required' => '', 'minlength' => '6']) }}  
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    {{ Form::checkbox('remember') }}&nbsp;&nbsp;{{ Form::label('remember', "Remember Me") }}
                </div>
            </div>

            {{ Form::submit('Login', ['class' => 'btn btn-primary btn-block']) }}
        {!! Form::close() !!}

{{--         <p> <a href="{{ url('contactus') }}">Forgot Password?</a> </p>
 --}}

         <p> <a href="{{ url('/password/reset') }}">Forgot Password?</a> </p>
    </div>
</div>
<br>
<p><i>Please Login to Continue</i></p>
<p><i>Once logged in you can use the Support Menu For Help </i></p>




