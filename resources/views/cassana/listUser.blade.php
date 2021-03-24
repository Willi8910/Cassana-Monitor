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
	<div class="span7" style="width:800px; margin:50px auto; float:none;">
		<br>
		<div style="margin-bottom: 25px;">
	
		
		</div>
		<div class="widget stacked widget-table action-table">
			<div class="widget-header" style="text-align: center;">
							</div> 
			<div class="widget-content">
					<div>
			<form style="margin: 0 auto; width: 570px;" method="POST" action="{{ url('/CariPegawai') }}">
				<input type="hidden" name="_token" value="{!! csrf_token()!!}"/> 
				<label style="float: left; margin: 10px;">Cari berdasarkan Nama</label>				
				<input type="text" name="cari" class="span2" style="float:left; margin: 10px;">
				<input type="submit" value="Cari" class="btn btn-primary" style="margin: 10px;">
			</form>
		</div>
				<table class="table table-striped table-bordered">
					<thead>
						<tr>

							   <th>ID</th>
							   <th>Nama</th>
							   <th>Jabatan</th>
							<th class="td-actions">Proses</th>
						</tr>
					</thead>
					<tbody>
				
		
			@foreach ($Users as $key => $row)
				<tr>
				<td > {{ $row->id }}</td>
					<td> {{ $row->name }}</td>	
					<td>{{$row->jabatan}}</td>
					
					@isset($row->proses)
						<td> {{ $row->proses }}</td> 
					@else
						<td>-</td>
					@endisset
					
					

				</tr>

			@endforeach	

					</tbody>
				</table>

			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	

	</div>
	</div>
	@endsection
