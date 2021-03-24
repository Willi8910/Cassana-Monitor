@extends('layouts.menu')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
			<hr style="height: 0.1px; border: solid; background-color: black;">
			@isset($test)
			@endisset
		</div>
		<!-- /.col-lg-12 -->
	</div>
	@isset($message)
	        <div class="alert alert-success">
	            {{ session('message') }}
	        </div>
    @endisset
	<div class="span7" style="width:800px; margin:50px auto; float:none;">
		<br>
		
		<div style="margin-bottom: 25px;">
	
		
		</div>

		<div class="widget stacked widget-table action-table">
			<div class="widget-header" style="text-align: center;">
							</div> 
			<div class="widget-content">
					<div>
			<form style="margin: 0 auto; width: 570px;" method="POST" action="{{ url('/CariPesanan') }}">
				<input type="hidden" name="_token" value="{!! csrf_token()!!}"/> 
				<label style="float: left; margin: 10px;">Cari berdasarkan Nama</label>				
				<input type="text" name="cari" class="span2" style="float:left; margin: 10px;">
				<input type="submit" value="Cari" class="btn btn-primary" style="margin: 10px;">
			</form>
		</div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>

							   <th>Nomor</th>
							   <th align="center">Nama</th>
							<th class="td-actions">Status</th>
							<th>Deadline</th>
							<th>Project Manager</th>
							@if (Auth::user()->jabatan == 'admin')
								<th align="center">Edit</th>
								<th align="center">Delete</th>
							@endif
						</tr>
					</thead>
					<tbody>
				
		
			@foreach ($Pesanans as $key => $row)
				@isset($row->dd)
					@if (Auth::user()->jabatan == 'admin')
						<tr style="background-color: #f4c141;">
					@else
						<tr>
					@endif
				@else
					<tr>

				@endisset
				<td > {{ $key+1 }}</td>
					<td>  <a href="{{ url('cassana/'.$row->nomor) }}"> {{ $row->nama }}</a></td>	
					<td> {{ $row->Prosesess->nama_proses }}</td> 
					<td>{{$row->deadline}}</td>
					@isset($row->project_manager)
						<td align="center">{{$row->project_manager}}</td>
					@else
						<td align="center">--none--</td>
					@endisset
					@if (Auth::user()->jabatan == 'admin')
						<td align="center"><a href="{{ url('/cassana/'.$row->nomor.'/edit') }}"><i style="font-size:24px" class="fa">&#xf044;</i></a></td>
						<td align="center"><a onclick="return confirm('Apakah anda yakin menghapus pesanan ini?')" href="{{ url('/cassanadelete/'.$row->nomor) }}"><i style="font-size:24px" class="fa">&#xf014;</i></a></td>
					@endif
				</tr>

			@endforeach	

					</tbody>
				</table>
				{{ $Pesanans->links("pagination::bootstrap-4") }}
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
		

	</div>
	</div>
	@endsection