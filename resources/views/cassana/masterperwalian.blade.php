@extends('layouts.menumahasiswa')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Perwalian</h1>
			<hr style="height: 0.1px; border: solid; background-color: black;">
		</div>
		<!-- /.col-lg-12 -->
	</div>
		<div class="span7" style="width:800px; margin:50px auto; float:none;">
		<br>
		@if($wrd == '-1')
			<h3>Status : {{$perwalian->nama .': '. $perwalian->status .' dimulai'}}</h3>

		@else
			<h3>Status : {{$perwalian->nama .': Dimulai'}}</h3>

			<form action="{{url('/update-perwalian')}}" method="POST">
		<input type="hidden" name="_token" value="{!! csrf_token() !!}"/>
			<input type="submit" class="btn btn-primary" value="{{$wrd}}"></input>
		</form>
		@endif
		<div class="widget stacked widget-table action-table">
			<div class="widget-header" style="text-align: center;">
				<h3>Jadwal Perwalian</h3>
			</div> 
			<div class="widget-content">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nama</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@if(count($listperwalians)>0)
						@foreach($listperwalians as $perwalians)
						<tr>
							<td>{{$perwalians->id}}</td>
							<td>{{$perwalians->nama}}</td>
							<td>{{$perwalians->tanggal_mulai}}</td>
							<td>{{$perwalians->tanggal_selesai}}</td>
							<td>{{$perwalians->status}}</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div> <!-- /widget -->
	</div>
	@endsection
