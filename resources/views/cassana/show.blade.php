@extends('layouts.menu')

@section('content')
	<style type="text/css">
		h3,h4,h2
		{
			color:#606060	;	;
		}
	</style>
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
				@if($Pesanans->proses_id < 7)
					@isset($Pesanans->dd)
						<h2 style="color: #ff0000;">{{ $Pesanans->nama }}</h2>
					@else
						<h2>{{ $Pesanans->nama }}</h2>

					@endisset	
				@else
					<h2 style="color: green;">{{ $Pesanans->nama ."(Selesai)"}}</h2>

				@endif
				<br>

			</div> 
				
								
								
					<div class="card" style="width: 100%;">
						<div align="center">
					  <img class="card-img-top" width="300" height="300" src="{{$Pesanans->desain}}" alt="Card image cap"></div>
					  <div class="col-md-6">
					  	<br>
					  	
					    	<h3 class="card-text">Detail Pemesanan</h3>
					    
					    
					    <h4 class="card-title">Project Manager : <b>{{ $Pesanans->project_manager }}</b></h4>
					    <h4 class="card-text">Panjang : <b>{{ $Pesanans->panjang }} cm</h4>
					    <h4 class="card-text">Lebar : <b>{{ $Pesanans->lebar }} cm</b></h4>
					    <h4 class="card-text">Tinggi : <b>{{ $Pesanans->tinggi }} cm</b></h4>
					    <h4 class="card-text">Waktu Input : <b>{{ $Pesanans->created_at }}</b></h4>
					    <h4 class="card-text">Deadline : <b>{{ $Pesanans->deadline }}</b></h4>
					    <h4 class="card-text">Jumlah : <b>{{ $Pesanans->jumlah }}</b></h4>
					    <h4 class="card-text">Status : <b>{{ $Pesanans->Prosesess->nama_proses }}</b></h4>
					    <h4 class="card-text">Deskripsi : <b>{{ $Pesanans->deskripsi }}</b></h4>
					    <h4 class="card-text">Assembly : <b>{{ $Pesanans->assembly }}</b></h4>
					    <br>
					   </div>
					   <div class="col-md-6">
					   	<br>
					    <!-- Kalo proses pemesanan belum selesai -->
					    @if($Pesanans->proses_id < 7)
					    <h3>Progress Pemesanan</h3>
					    @foreach ($progres as $key => $row)
					    	@if($row->id <= $Pesanans->proses_id)
					    		@if(Auth::user()->jabatan === "karyawan" && Auth::user()->proses_id === $row->id && $row->pivot->progress < $row->max)
					    			<form method="POST" action="{{url('updateProses/'.$row->pivot->pesanan_id)}}">
					    			<input type="hidden" name="_token" value="{!! csrf_token()!!}"/> 
					    			<!-- Kalo prosesnya itu desain -->
					    			@if($row->id === 1)
					    				<h4 style="display: inline-block;">{{$row->nama_proses}} : {{$row->pivot->progress.' '. $row->limit}}</h4>
					    			@else
					    				<h4 style="display: inline-block;">{{$row->nama_proses}} : </h4>
					    				<input type="number" name="pnumber" value="{{$row->pivot->progress}}" min="{{$row->pivot->progress}}" max="{{$row->max}}" style="display: inline-block;">
					    				<h4 style="display: inline-block;">{{ $row->limit}}</h4>
					    			@endif
					    			<input style="display: inline-block;" type="submit" name="btnSubmit" value="Update">
					    			</form>
					    		@else
					    		<h4 style="display: inline-block;">{{$row->nama_proses}} : {{$row->pivot->progress.' '. $row->limit}}</h4>
					    		@if($row->pivot->progress == $Pesanans->jumlah)
					    		<span class="glyphicon" style="display: inline-block; color: green;">&#xe089;</span>
					    		@endif
					    		<br>
					    		@endif
					    	@endif
					    @endforeach
					    @endif
					    </div>
					  <br>
					  <div class="col-md-12">

					    @if(Auth::user()->jabatan === "admin")
					    	<a href="{{ url('/cassana') }}" class="btn btn-info" role="button">Back</a>

						    <a href="{{ url('/cassana/'.$Pesanans->nomor.'/edit') }}" class="btn btn-info" role="button">Edit</a>
						    <a onclick="return confirm('Apakah anda yakin menghapus pesanan ini?')" href="{{ url('/cassanadelete/'.$Pesanans->nomor) }}"  class="btn btn-info" role="button">Delete</a>
						@else
					    <a href="{{ url('/listProses') }}" class="btn btn-info" role="button">Back</a>

					    @endif
					  </div>
					</div>
					
		</div> <!-- /widget -->
	</div>
	 </div>
	<!-- /.row -->
</div>
<a href="{{ url('cassana') }}">[Kembali]</a>
@endsection

