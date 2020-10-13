@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="form_pengguna">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nip') }}</label>

                            <div class="col-md-6">
                                <input id="nip" name="nip" type="number" min="1" max="10" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{ old('nip') }}" required autocomplete="nip">

                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('No Telepon') }}</label>

                            <div class="col-md-6">
                                <input id="no_hp" name="no_hp" type="number" min="1" max="10" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" value="{{ old('no_hp') }}" required autocomplete="no_hp">

                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Level Pengguna') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" style="font-size: 14px;" id="level_pengguna" name="level_pengguna" data-live-search="true">
                                    <option value="pilih" disabled selected>-- Pilih Level Pengguna --</option>
                                    @foreach($rslevel as $resultlevel)
                                        <option value="{{$resultlevel->id}}" data-areaname="{{$resultlevel->name}}">{{$resultlevel->display}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Pilih Subdit') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" style="font-size: 14px;" id="kode_subdirektorat" name="kode_subdirektorat" data-live-search="true">
                                    <option value="pilih" disabled selected>-- Pilih Subdit --</option>
                                    @foreach($rssubdit as $result)
                                        <option value="{{$result->kode_subdirektorat}}" data-areaname="{{$result->nama_subdirektorat}}">{{$result->display}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Pilih Seksi') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" style="font-size: 14px;" id="kode_seksi" name="kode_seksi" data-live-search="true">
                                    <option value="pilih" disabled selected>-- Pilih Kasi --</option>
                                    @foreach($rsseksi as $resultseksi)
                                        <option value="{{$resultseksi->kode_seksi}}" data-areaname="{{$resultseksi->nama_seksi}}">{{$resultseksi->display}}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn bg-cyan waves-effect" id="btn_registrasi"><i class="material-icons"></i><span>&nbsp;Registrasi</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script-footer')
<script src="{{url('js/registrasi/registrasi_user/add_app.js')}}"></script> 


<script type="text/javascript">
    var url_api = "{{url('api/v1/Registeruser/RegisterUser/store')}}"
</script>
@endpush
@endsection
