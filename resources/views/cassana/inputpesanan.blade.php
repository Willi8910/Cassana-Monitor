@extends('layouts.menu')

@section('content')
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Input Pesanan</h1>
      @isset($message)
        <div class="alert alert-success">
            {{ $message }}
        </div>
      @endisset
			<hr style="height: 0.1px; border: solid; background-color: black;">
		</div>
		<!-- /.col-lg-12 -->
	</div>
	    <div class="row">
                    <div class="col-lg-6">
                      @isset($Input)

                        <form  method="POST" enctype="multipart/form-data" action="{{ url('/cassanaupdate/'.$Pesanans->nomor) }}">

                            <div class="form-group">
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/> 

                                <label>Desain</label>
                                <input type="file" name="btnFile"  onchange="readURL(this);">
                                 <img style="width:300px;height:auto;" id="btnFile" alt="IMG-PRODUCT1" src="{{URL::asset('../storage/app/'.$Pesanans->desain)}}"><br>
                                 <label>Project Manager</label>
                                <input class="form-control" name="pm" type="test" value="{{$Pesanans->project_manager}}" placeholder="Your name" required validate>

                                <label>Nama</label>
                                <input class="form-control" name="nama" type="test" value="{{$Pesanans->nama}}" placeholder="Your name" required validate>
                                  <label>Deadline</label>
                                <input class="form-control" name="deadline" type="date" min="{{$tanggal}}" value="{{$Pesanans->deadline}}" placeholder="Your name" required validate>
                                  <label>Keterangan</label>
                                <input class="form-control" name="deskripsi" type="text" value="{{$Pesanans->deskripsi}}" placeholder="Description" validate>
                                <label>Proses</label>
                                  <select id="proses" type="text" class="form-control" name="proses" required>
                                    @foreach($prosess as $proses)
                                        @if($proses->id === $Pesanans->proses_id)
                                          <option value="{{$proses->id}}" selected>{{$proses->nama_proses}}</option>
                                        @else
                                          <option value="{{$proses->id}}">{{$proses->nama_proses}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                  <label>Panjang</label>
                                <input class="form-control" name="panjang" type="number" value="{{$Pesanans->panjang}}" placeholder="panjnag" required validate>
                                  <label>Lebar</label>
                                <input class="form-control" name="lebar" type="number" value="{{$Pesanans->lebar}}" required validate>
                                  <label>Tinggi</label>
                                <input class="form-control" name="tinggi" type="number" value="{{$Pesanans->tinggi}}"  required validate>
                                  <label>Jumlah</label>
                                <input class="form-control" name="jumlah" type="number" value="{{$Pesanans->jumlah}}"   required validate>                              
                            </div>

                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>
                      @else

                        <form  method="POST" enctype="multipart/form-data" action="{{ url('/cassana') }}">

                            <div class="form-group">
                            <input type="hidden" name="_token" value="{!! csrf_token()!!}"/> 

                                <label>Desain</label>
                                <input type="file" name="btnFile" onchange="readURL(this);" required>
                                <img style="width:300px;height:auto;" id="btnFile" alt="IMG-PRODUCT1"><br>
                                <label>Nama</label>
                                <input class="form-control" name="nama" type="test" placeholder="Your name" required validate>
                                  <label>Deadline</label>
                                <input class="form-control" name="deadline" type="date" min="{{$tanggal}}" placeholder="Your name" required validate>
                                  <label>Keterangan</label>
                                <input class="form-control" name="deskripsi" type="text" placeholder="Description" validate>
                                  <label>Panjang</label>
                                <input class="form-control" name="panjang" type="number" placeholder="panjnag" required validate>
                                  <label>Lebar</label>
                                <input class="form-control" name="lebar" type="number" required validate>
                                  <label>Tinggi</label>
                                <input class="form-control" name="tinggi" type="number"  required validate>
                                  <label>Jumlah</label>
                                <input class="form-control" name="jumlah" type="number"  required validate>
                                <label>Butuh Assembly: </label>
                                 <input class="form-control" style="width: 100px;" name="assembly" type="checkbox">
                            </div>

                            <button type="submit" class="btn btn-default">Submit Button</button>
                            <button type="reset" class="btn btn-default">Reset Button</button>

                        </form>
                        @endisset

                    </div>
                  
                </div>
	
	</div>
	@endsection

  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //alert(input.name);
            reader.onload = function (e) {
                $('#'+input.name)
                    .attr('src', e.target.result)
                    .width(300)
                    .height(auto);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
