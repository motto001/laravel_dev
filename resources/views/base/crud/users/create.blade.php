@extends('tmpl::dashboard')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New User</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
	        </div>
	    </div>
	</div>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<!-- laradrop --------------------------------- -->


  <div class="input-group form-group">
      <span class="input-group-addon" >
        File ID: <strong class="file-id">*</strong>
      </span>
      <input type="text" class="form-control file-src" id="file1"  placeholder="File Thumb Source">
      <span class="input-group-btn">
        <button class="btn btn-default modal-btn" type="button" data-toggle="modal" data-target="#myModal">Select File</button>
      </span>
  </div>

  <div class="input-group form-group">
      <span class="input-group-addon" >
        File ID: <strong class="file-id">*</strong>
      </span>
      <input type="text" class="form-control file-src" id="file2"  placeholder="File Thumb Source">
      <span class="input-group-btn">
        <button class="btn btn-default modal-btn" type="button" data-toggle="modal" data-target="#myModal">Select File</button>
      </span>
  </div>

  <div class="input-group form-group">
      <span class="input-group-addon" >
        File ID: <strong class="file-id">*</strong>
      </span>
      <input type="text" class="form-control file-src" id="file2"  placeholder="File Thumb Source">
      <span class="input-group-btn">
        <button class="btn btn-default modal-btn" type="button" data-toggle="modal" data-target="#myModal">Select File</button>
      </span>
  </div>





<!-- resources/views/vendor/laradrop/mainContainer.blade.php -->                      

<!-- resources/views/vendor/laradrop/previewContainer.blade.php -->                       


	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>
	</div>
	{!! Form::close() !!}

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">My Media Manager</h4>
      </div>
      <div class="modal-body">
       
            <div class="laradrop" laradrop-csrf-token="{{ csrf_token() }}" ></div>    </div>
            <div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

@endsection