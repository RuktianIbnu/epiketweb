@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><i class="material-icons">widgets</i> Master Data Kegiatan</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					Daftar Kegiatan
				</h2>
				<hr/>
				<a href="{{url('/masterdata/kegiatan/add')}}" id="btn_tambah" class="btn bg-indigo waves-effect"><i class="material-icons">add_circle_outline</i>&nbsp;Tambah Data</a>
			</div>

			<div class="body">
			
				<div class="panel panel-success">
					<div class="panel-heading bg-light-green">
						Daftar Jenis Kegiatan
					</div>
					<div class="panel-body table-responsive">
						<table id="tb_kegiatan" width="100%" role="grid" class="table table-striped table-bordered table-hover table-responsive">
							<thead class="bg-teal">
								<tr>
									<th style="text-align: center;" class="th_table">No</th>
									<th style="text-align: center;" class="th_table">Nama Jenis Kegiatan</th>
									<th style="text-align: center;" class="th_table">Deskripsi Jenis Kegiatan</th>
									<th style="text-align: center;" class="th_table">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0;?>
								@foreach($rs as $result)
								<?php $no++ ;?>
									<tr id="{{$result->id}}">
										<td>{{$no}}</td>
										<td>{{$result->kode_jenis}}</td>
										<td>{{$result->jenis_kegiatan}}</td>
										<td>
											<a href="{{url('/masterdata/kegiatan/show/'.$result->id)}}" title="EDIT KEGIATAN">
												<i class="btn btn-xs waves-effect material-icons" id="btn_edit">edit</i>
											</a>
											<i class="btn btn-xs waves-effect material-icons" id="btn_hapus" title="Hapus Data" data-id="{{$result->id}}" data-nama="{{$result->jenis_kegiatan}}">delete</i>
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
<script src="{{url('js/masterdata/kegiatan/index_app.js')}}"></script>

<script type="text/javascript">
	var url_api = "{{url('api/v1/masterdata/kegiatan/delete')}}"
	var url_index = "{{url('/masterdata/kegiatan')}}"
</script>
@endpush
@endsection