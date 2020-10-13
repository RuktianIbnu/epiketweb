@extends('layouts.layout')
@section('content')
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<ol class="breadcrumb breadcrumb-bg-teal">
            <li><a href="{{url('/home')}}"><i class="material-icons">home</i> Home</a></li>
            <li class="active"><i class="material-icons">widgets</i> Master Subdit</li>
        </ol>
		<div class="card">
			<div class="header bg-green">
				<h2>
					Subdirektorat
				</h2>
				<hr/>
				<a href="{{url('/masterdata/subdit/add')}}" id="btn_tambah" class="btn bg-indigo waves-effect"><i class="material-icons">add_circle_outline</i>&nbsp;Tambah Data</a>
			</div>

			<div class="body">
			
				<div class="panel panel-success">
					<div class="panel-heading bg-light-green">
						Daftar Subdit
					</div>
					<div class="panel-body table-responsive">
						<table id="tb_subdit" width="100%" role="grid" class="table table-striped table-bordered table-hover table-responsive">
							<thead class="bg-teal">
								<tr>
									<th style="text-align: center;" class="th_table">No</th>
									<th style="text-align: center;" class="th_table">Kode Subdirektorat</th>
									<th style="text-align: center;" class="th_table">Nama Subdirektorat</th>
									<th style="text-align: center;" class="th_table">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 0;?>
								@foreach($rs as $result)
								<?php $no++ ;?>
									<tr id="{{$result->id}}">
										<td>{{$no}}</td>
										<td>{{$result->kode_subdirektorat}}</td>
										<td>{{$result->nama_subdirektorat}}</td>
										<td>
											<a href="{{url('/masterdata/subdit/show/'.$result->id)}}" title="EDIT Subdirektorat">
												<i class="btn btn-xs waves-effect material-icons" id="btn_edit">edit</i>
											</a>
											<i class="btn btn-xs waves-effect material-icons" id="btn_hapus" title="Hapus Data" data-nip="{{$result->id}}" 
												data-nama="{{$result->nama_subdirektorat}}">delete</i>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
                		<div class="body pull-right">
							     Menampilkan <div class="badge bg-teal badge-pill">{{ $rs->count() }}</div> dari <div class="badge bg-pink badge-pill">{{ $rs->total() }}</div> data
						</div>
                		
					</div>
				</div>
				
			</div>
		</div>
	</div>

</div>
@push('script-footer')
<script src="{{url('js/masterdata/subdit/index_app.js')}}"></script>

<script type="text/javascript">
	var url_api = "{{url('api/v1/masterdata/subdit/delete')}}"
	var url_index = "{{url('/masterdata/subdit/')}}"
</script>
@endpush
@endsection