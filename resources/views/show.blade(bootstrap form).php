 <br>
 @extends('layouts.main')

@section('title')
  {{ strip_tags($product->prod_name) }}
@endsection

@section('content')
<div class="container"> 
  <div class="row">

    <h2 class="pull-left move-right"> {{ strip_tags($product->prod_name) }} - Data Entry</h2>
    <a href="{{ URL::previous() }}" class="btn btn-primary pull-right move-down move-left" role="button">Return to Previous Pageee</a>
  </div>

  <div class="row body-background">

    <div class="col-md-5">
      <br><br>
      <img src=" {{ $product->imagePath }} " class="img-responsive img-border" alt="..." >
    </div>

    <div class="col-md-7">
      <br>
      <h5>Franchise Name: {{ Auth::user()->loc_name }}<br>Enter the data for your "{{ strip_tags($product->prod_name) }}"</h5>
      <div class="panel panel-primary space-above">
      <div class="panel-body">

<form class="form-horizontal" action="{{ route('showData') }}">
  <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" placeholder="Name">
    </div>
  </div>
  <div class="form-group">
    <label for="title" class="col-sm-2 control-label">Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="title" placeholder="Title">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>

      
  {{-- {!! Form::open(['data-parsley-validate' => '', 'route' => 'slash']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:', ['class' => 'col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text">
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('title', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::email('email', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address1', 'Address1:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address1', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('address2', 'Address2:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('address2', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('city', 'City:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-10 control-text move-down">
          {!! Form::text('city', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-inline">

    <div class="form-group">
        {!! Form::label('state', 'State:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('state', null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::label('zip', 'Zip:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('zip', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('phone', 'Phone:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('phone', null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::label('fax', 'Fax:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('fax', null, ['class' => 'form-control']) !!}
      </div>
    </div>

    <div class="form-group">
        {!! Form::label('license', 'License:', ['class' => 'move-down col-sm-2 control-label']) !!}
      <div class="col-sm-4 control-text move-down">
          {!! Form::text('license', null, ['class' => 'form-control']) !!}
      </div>
      {!! Form::label('cell', 'Cell:', ['class' => 'move-down col-sm-2 control-label-zip']) !!}
      <div class="col-sm-4 control-text-zip move-down">
          {!! Form::text('cell', null, ['class' => 'form-control']) !!}
      </div>
    </div> --}}

    {{-- </div> closes <div class="form-inline"> --}}

   {{--  <div class="form-group">
        {!! Form::label('specialInstructions', 'Special Instructions:', ['class' => 'col-sm-4 control-label']) !!}
        <div class="col-sm-8 move-down move-right">
          {!! Form::textarea('specialInstructions', null, ['class' => 'form-control control-textarea', 'rows' => '2']) !!}
      </div>
    </div>

    {{ Form::button('Show Data', ['class' => 'btn btn-primary pull-right col-sm-4 move-down move-left']) }}               
    {!! Form::close() !!} --}}

        </div> {{-- closes <div class="panel-body"> --}}
      </div> {{-- closes <div class="panel panel-primary space-above"> --}}
    </div> {{-- closes <div class="col-md-7"> --}}
  </div> {{-- closes <div class="row body-background"> --}}
  {{-- </div> --}}

@endsection    







