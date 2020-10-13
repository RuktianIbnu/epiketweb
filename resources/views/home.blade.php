@extends('layouts.layout')
@section('content')

<!-- <div class="block-header">
    <h2>BERANDA</h2>
</div> -->

<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
        <div class="card">
            @if (Auth::user()->aktif == 1)
                <div class="body bg-red">
                    Selamat Datang {{ Auth::user()->nama }} - {{ Auth::user()->nip }}.
                </div>
            @else
                <div class="body bg-red">
                    Selamat Datang {{ Auth::user()->nama }} - {{ Auth::user()->nip }}, Akun Belum di Verifikasi Oleh ADMIN.
                </div>
            @endif
        </div>
    </div>
    
    @if (Auth::user()->level_pengguna != 5)
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                <div class="text">Petugas</div>
                <div class="number count-to" data-from="0" data-to="{{$countuser}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    @endif

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">store</i>
            </div>
            <div class="content">
                <div class="text">Total Kunjungan Checkin</div>
                <div class="number count-to" data-from="0" data-to="{{$countcheckin}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-red hover-zoom-effect">
            <div class="icon">
                <i class="material-icons">store</i>
            </div>
            <div class="content">
                <div class="text">Total Kunjungan CheckOut</div>
                <div class="number count-to" data-from="0" data-to="{{$countcheckout}}" data-speed="1000" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading bg-light-green">
                Daftar Checkin
            </div>
            <div class="panel-body table-responsive">
                <table id="tb_user" width="100%" role="grid" class="table table-striped table-bordered table-hover table-responsive">
                    <thead class="bg-teal">
                        <tr>
                            <th style="text-align: center;" class="th_table">No</th>
                            @if(Auth::user()->level_pengguna != 5)
                                <th style="text-align: center;" class="th_table">Nama Petugas</th>                                      
                            @endif
                            <th style="text-align: center;" class="th_table">Nama Lengkap</th>
                            <th style="text-align: center;" class="th_table">Departement / Perusahaan</th>                                  
                            <th style="text-align: center;" class="th_table">Lokasi</th>                                    
                            <th style="text-align: center;" class="th_table">Kegiatan</th>
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
                                @if(Auth::user()->level_pengguna != 5)
                                    <td>{{$result->nama_petugas}}</td>                                      
                                @endif
                                <td>{{$result->nama}}</td>
                                <td>{{$result->departement}}</td>
                                <td>{{$result->lokasi}} - Ruang {{$result->nama_ruang}}</td>
                                <td>{{$result->kode_jenis}}</td>
                                <td>{{$result->tanggal_mulai}}</td>
                                <td>
                                    <a href="{{url('/transaksi/pendataan/show/'.$result->id)}}" title="Check Out">
                                        <i class="btn btn-xs waves-effect bg-orange" id="btn_edit">Check Out</i>
                                    </a>
                                    <a href="{{url('/transaksi/pendataan/cetak_pdf/'.$result->id)}}">
                                        <i class="btn btn-xs waves-effect material-icons" id="btn_print" title="PRINT" data-id="{{$result->id}}" data-vendor="{{$result->departement}}" data-kegiatan="{{$result->kategori}}" data-lokasi="{{$result->lokasi}}">print</i>
                                    </a>
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
    @push('script-footer')
    <script type="text/javascript">
        $('.count-to').countTo()
    </script>
    @endpush
</div>
@push('script-footer')
<script src="{{url('js/transaksi/pendataan/index_app.js')}}"></script>

<script type="text/javascript">
    var url_pendataan = "{{url('/transaksi/pendataan/')}}"
</script>
@endpush
@endsection