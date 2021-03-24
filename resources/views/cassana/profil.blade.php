@extends('layouts.menu')

@section('content')
	<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<hr style="height: 0.1px; border: solid; background-color: black;">
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
	<div class="span7" style="width:800px; margin:50px auto; float:none;">
		<br>
	
		<div class="widget stacked widget-table action-table">
			<div class="widget-header" style="text-align: center;">
				<!-- <i class="icon-th-list"></i> -->
				<h3>Profil User</h3>
				<br><br><br>	
				<div class="card" style="width: 100%;">
					  <div class="card-body">
					    <h4 class="card-title">Id : <b>{{ Auth::user()->id }}</b></h4>
					    <h4 class="card-title">Nama : <b>{{ Auth::user()->name }}</b></h4>
					    <h4 class="card-title">Username : <b>{{ Auth::user()->username }}</b></h4>
					    <h4 class="card-title">Jabatan : <b>{{ Auth::user()->jabatan }}</b></h4>
					    @if(Auth::user()->jabatan === "karyawan")
					    	<h4 class="card-title">Proses : <b>{{ Auth::user()->Proses->nama_proses }}</b></h4>

					    @endif
					  </div><br>
					  <div class="card-body">
					    <a href="{{ url('cassana') }}" class="btn btn-info" role="button">Back</a>
					    <a href="{{url('/editUser/'.Auth::user()->id)}}" class="btn btn-info" role="button">Edit</a>
					  </div>
					</div>
			</div> 
		</div> <!-- /widget -->
	</div>
	 </div>
	<!-- /.row -->
</div>
<a href="{{ url('cassana') }}">[Kembali]</a>
@endsection
