@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><i class="material-icons">widgets</i> Registrasi User</li>
        </ol>
		<div class="card">

			<div class="body">
			
				<div class="panel panel-success">
					<div class="panel-heading bg-light-green">
						Daftar Registrasi
					</div>
					<div class="panel-body table-responsive">
						<table id="tb_regis" width="100%" role="grid" class="table table-striped table-bordered table-hover table-responsive">
							<thead class="bg-teal">
								<tr>
									<th style="text-align: center;" class="th_table">No</th>
									<th style="text-align: center;" class="th_table">Nama</th>
									<th style="text-align: center;" class="th_table">NIP</th>
									<th style="text-align: center;" class="th_table">No Telepon</th>
									<th style="text-align: center;" class="th_table">Level</th>
									<th style="text-align: center;" class="th_table">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0;?>
								@foreach($rs as $result)
								<?php $no++ ;?>
									<tr id="{{$result->id}}">
										<td>{{$no}}</td>
										<td>{{$result->nama}}</td>
										<td>{{$result->nip}}</td>
										<td>{{$result->no_hp}}</td>
										<td>@if($result->level_pengguna == 1) 
												<span class="badge bg-orange">SUPERADMIN</span> 
											@elseif($result->level_pengguna == 2 ) 
												<span class="badge bg-cyan">Direktur</span> 
											@elseif($result->level_pengguna == 3) 
												<span class="badge bg-teal">Kasubdit {{$result->nama_subdirektorat}}</span>
											@elseif($result->level_pengguna == 4) 
												<span class="badge bg-pink">Kasi {{$result->nama_seksi}}</span>  
											@elseif($result->level_pengguna == 5) 
												<span class="badge bg-pink">Petugas subdit {{$result->nama_subdirektorat}} , seksi {{$result->nama_seksi}}</span>
											@endif
										</td>
										<td>
											<i class="btn bg-green waves-effect glyphicon glyphicon" id="btn_acc" title="Terima" data-nama="{{$result->nama}}" data-nip="{{$result->nip}}" data-id="{{$result->id}}">Terima</i>
											<i class="btn bg-red waves-effect glyphicon glyphicon" id="btn_hapus" title="Tolak" data-nama="{{$result->nama}}" data-nip="{{$result->nip}}"data-id="{{$result->id}}">Tolak</i>
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
<script src="{{url('js/registrasi/registrasi_user/index_app.js')}}"></script>

<script type="text/javascript">
	var url_api_tolak = "{{url('api/v1/Registeruser/RegisterUser/delete')}}"
	var url_api_acc	  = "{{url('api/v1/Registeruser/RegisterUser/acc')}}"
	var url_register  = "{{url('/registeruser/registeruser/')}}"
</script>
@endpush
@endsection