@extends('layouts.menu')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Edit Profil</h1>
      
			<hr style="height: 0.1px; border: solid; background-color: black;">
		</div>
		<!-- /.col-lg-12 -->
	</div>
	    <div class="row">
                    <div class="col-lg-6">

                        <form  method="POST" action="{{url('/editUser/'.Auth::user()->id)}}">

                            <div class="form-group">
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/> 
                                <label>Nama</label>
                                <input class="form-control" name="nama" type="test" value="{{$users->name}}" placeholder="Your name" required validate>
                                  <label>username</label>
                                <input class="form-control" name="username" type="text" value="{{$users->username}}" placeholder="Description" required validate>                               
                            </div>

                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>                      
                    </div>
                  
                </div>
	
	</div>
	@endsection
