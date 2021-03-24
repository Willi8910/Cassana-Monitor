@extends('layouts.menu')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Change Password</h1>
			<hr style="height: 0.1px; border: solid; background-color: black;">
		</div>
		<!-- /.col-lg-12 -->
	</div>
	    <div class="row">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
                    <div class="col-lg-6">

                <form  method="POST" action="{{url('/changePassword')}}" >

                            <div class="form-group">
                               
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/> 
                                
                                  <label>Current Password</label>
                                <input class="form-control" name="current-password" type="password" placeholder="current password" required validate>
                                  <label>New Password</label>
                                <input class="form-control" name="new-password" type="password" placeholder="New Password" required validate>
                                  <label>Confirm Password</label>
                                <input class="form-control" name="newpass" type="password" placeholder="Confirm Password" required validate>
                              
                            </div>

                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>
                    </div>
                  
                </div>
	
	</div>
	@endsection
