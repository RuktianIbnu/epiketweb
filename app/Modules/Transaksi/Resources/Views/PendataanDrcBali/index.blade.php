@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><i class="material-icons">widgets</i> Pendataan Piket DRC Bali</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					Data Monitoring
				</h2>
				<hr/>
				<a href="{{url('/transaksi/PendataanDrcBali/add')}}" id="btn_tambah" class="btn bg-indigo waves-effect"><i class="material-icons">add_circle_outline</i>&nbsp;Tambah Data</a>
			</div>

			<div class="body">
			
				<div class="panel panel-success">
					<div class="panel-heading bg-light-green">
						Daftar Kegiatan Pusdakim
					</div>
					<div class="panel-body table-responsive">
						<table id="tb_user" width="100%" role="grid" class="table table-striped table-bordered table-hover table-responsive">
							<thead class="bg-teal">
								<tr>
									<th style="text-align: center;" class="th_table">Petugas</th>
									<th style="text-align: center;" class="th_table">Tanggal Dan Jam</th>									
									<th style="text-align: center;" class="th_table">Keterangan</th>
									<th style="text-align: center;" class="th_table">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($rs as $result)
										<tr id={{$result->id}}>
											<td>{{$result->petugas_1}} dan {{$result->petugas_2}}</td>
											<td>{{$result->tanggal}} - {{$result->waktu}}</td>
											<td>{{$result->keterangan}}</td>
											<td>
												<a href="{{url('/transaksi/PendataanDrcBali/show/'.$result->id)}}" title="EDIT DATA">
													<i class="btn btn-xs waves-effect material-icons" id="btn_edit">edit</i>
												</a>
												<a href="{{url('/transaksi/PendataanDrcBali/cetak_pdf/'.$result->id)}}">
													<i class="btn btn-xs waves-effect material-icons" id="btn_print" title="PRINT" data-id="{{$result->id}}">print</i>
												</a>
												@if($level_pengguna == 1)												
														<i class="btn btn-xs waves-effect material-icons" id="btn_hapus" title="Hapus Data" data-id="{{$result->id}}">delete</i>
												@endif
											</td>
										</tr>
								@endforeach
							</tbody>							
						</table>
					<div class="body pull-right">
						     Menampilkan <div class="badge bg-pink badge-pill">{{ $count }}</div> data
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
@push('script-footer')
<script src="{{url('js/transaksi/pendataan_drc/index_app.js')}}"></script>

<script type="text/javascript">
	var url_api = "{{url('api/v1/transaksi/PendataanDrc/delete')}}"
	var url_pendataan = "{{url('/transaksi/PendataanDrcBali/')}}"
</script>
@endpush
@endsection