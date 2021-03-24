@extends('layouts.menu')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
			<hr style="height: 0.1px; border: solid; background-color: black;">
			@isset($message)
				<h4>{{$message}}</h4>
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
			<form style="margin: 0 auto; width: 570px;" method="POST" action="{{ url('/CariPesananProses') }}">
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
							   <th>Nama</th>
							<th class="td-actions">Status Terbaru</th>
							<th>Deadline</th>
							<th>Progress</th>
							<th>Project Manager</th>

							<th>Input Progress</th>
						</tr>
					</thead>
					<tbody>
				
		
			@foreach ($Pesanans as $key => $row)
			@if($Progres[$key]->pivot->progress < $Progres[$key]->max)
			@isset($row->dd)
					
					<tr style="background-color: #f4c141;">
				@else
					<tr>

			@endisset
				
				<td > {{ $key+1 }}</td>
				<td>  <a href="{{ url('/cassana/'.$row->id) }}"> {{ $row->nama }}</a></td>	
				<td> {{ $row->Prosesess->nama_proses }}</td> 
				<td>{{$row->deadline}}</td>
				<td>{{$Progres[$key]->pivot->progress . " / ". $Progres[$key]->max}}</td>
				@isset($Pesanans[$key]->project_manager)
						<td align="center">{{$Pesanans[$key]->project_manager}}</td>
					@else
						<td align="center">--none--</td>
					@endisset
				<td align="center">  <a href="{{ url('/cassana/'.$row->id) }}"> <i style="font-size:24px" class="fa">&#xf044;</i></a></td>	
				</tr>
			@endif
			@endforeach	

					</tbody>
				</table>
				

			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	

	</div>
	</div>
	@endsection
