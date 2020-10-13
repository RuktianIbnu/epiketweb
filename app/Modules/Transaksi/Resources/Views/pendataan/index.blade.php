@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><i class="material-icons">widgets</i> Pendataan Tamu / Vendor</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					Data Tamu
				</h2>
				<hr/>
				<a href="{{url('/transaksi/pendataan/add')}}" id="btn_tambah" class="btn bg-indigo waves-effect"><i class="material-icons">add_circle_outline</i>&nbsp;Tambah Data</a>
			</div>

			<div class="body">
			
				<div class="panel panel-success">
					<div class="panel-heading bg-light-green">
						Daftar Checkout
					</div>
					<div class="panel-body table-responsive">
						<table id="tb_user" width="100%" role="grid" class="table table-striped table-bordered table-hover table-responsive">
							<thead class="bg-teal">
								<tr>
									<th style="text-align: center;" class="th_table">No</th>									
									<th style="text-align: center;" class="th_table">Nama Petugas CheckIn - CheckOut</th>									
									<th style="text-align: center;" class="th_table">Nama Tamu/Vendor</th>
									<th style="text-align: center;" class="th_table">Departement / Perusahaan</th>									
									<th style="text-align: center;" class="th_table">Lokasi</th>									
									<th style="text-align: center;" class="th_table">Kategori Kegiatan</th>
									<th style="text-align: center;" class="th_table">Tanggal</th>
									<th style="text-align: center;" class="th_table">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0;?>
								@foreach($rs as $result)
								<?php $no++ ;?>
									<tr id={{$result->id}}>
										<td>{{$no}}</td>
										@if ($result->nama_petugas != $result->nama_petugas2)
											<td>{{$result->nama_petugas}} - {{$result->nama_petugas2}}</td>
										@elseif ($result->nama_petugas == $result->nama_petugas2)
											<td>{{$result->nama_petugas}}</td>
										@endif
										<td>{{$result->nama}}</td>
										<td>{{$result->departement}}</td>
										<td>{{$result->lokasi}} - Ruang {{$result->nama_ruang}}</td>
                            			<td>{{$result->kode_jenis}}</td>
										<td>{{$result->tanggal_mulai}}</td>
										<td>
											<a href="{{url('/transaksi/pendataan/show/'.$result->id)}}" title="Lihat Data">
												<i class="btn btn-xs waves-effect " id="btn_edit">Lihat Data</i>
											</a>
											<a href="{{url('/transaksi/pendataan/cetak_pdf/'.$result->id)}}">
												<i class="btn btn-xs waves-effect material-icons" id="btn_print" title="PRINT" data-id="{{$result->id}}" data-vendor="{{$result->departement}}" data-kegiatan="{{$result->kategori}}" data-lokasi="{{$result->lokasi}}">print</i>
											</a>
											@if($level_pengguna == 1)												
													<i class="btn btn-xs waves-effect material-icons" id="btn_hapus" title="Hapus Data" data-id="{{$result->id}}" data-vendor="{{$result->departement}}" data-kegiatan="{{$result->kategori}}" data-lokasi="{{$result->lokasi}}">delete</i>
											@endif
										</td>
									</tr>
								@endforeach
							</tbody>							
						</table>
						<div class="body pull-right">
							     Menampilkan <div class="badge bg-teal badge-pill">{{ $rs->count() }}</div> dari <div class="badge bg-pink badge-pill">{{ $rs->total() }}</div> data
						</div>
                		<div class="body">
                            <nav>
                                <ul class="pager">
                                    <li>{{ $rs->links() }}</li>
                                </ul>
                            </nav>
                        </div>
					</div>
				</div>
				
			</div>
		</div>
	</div>

</div>
@push('script-footer')
<script src="{{url('js/transaksi/pendataan/index_app.js')}}"></script>

<script type="text/javascript">
	var url_api = "{{url('api/v1/transaksi/pendataan/delete')}}"
	var url_pendataan = "{{url('/transaksi/pendataan/')}}"
</script>
@endpush
@endsection