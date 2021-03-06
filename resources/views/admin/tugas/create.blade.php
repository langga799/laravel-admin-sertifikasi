@extends('admin.layout.master')
@section('content')

<link rel="stylesheet" href="{{asset('public/vendors/bootstrap/dist/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/themify-icons/css/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/flag-icon-css/css/flag-icon.min.css')}}">
<link rel="stylesheet" href="{{asset('public/vendors/selectFX/css/cs-skin-elastic.css')}}">

<link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


<div class="col-lg-12">
    <div class="card">
        <div class="pl-4 card-header">
            <strong>{{$pagename}}</strong>
        </div>
    <div class="card-body card-block">

    @if($errors->any())
        <div class="alert alert-danger">
            <div class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item">
                    {{$error}}
                </li>
            @endforeach
            </div>
        </div>
        @endif

    <form class="col-lg-10" action="{{route('tugas.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
        <div class="row form-group">
            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Tugas</label></div>
            <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtnama_tugas" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
        </div>

            <div class="row form-group">
                <div class="col col-md-3"><label for="select" class=" form-control-label">Kategori Tugas</label></div>
                <div class="col-12 col-md-9">
                    <select name="optionid_kategori" id="optionid_kategori" class="form-control">
                    @foreach($data_kategori as $dk)
                        <option value="{{$dk->id}}">{{$dk->nama_kategori}}</option>
                    @endforeach
                    </select>
                </div>
            </div>

              <div class="row form-group">
                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Keterangan Tugas</label></div>
                <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtketerangan_tugas" placeholder="Text" class="form-control"><small class="form-text text-muted">This is a help text</small></div>
             </div>

            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Status Tugas</label></div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="inline-radio1" name="radiostatus_tugas" value="0" class="form-check-input">Masih Berjalan
                        </label>
                        <label for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="inline-radio2" name="radiostatus_tugas" value="1" class="form-check-input">Selesai
                        </label>
                    </div>
                </div>
            </div>

    </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Simpan
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Reset
            </button>
        </div>
        </div>

</div>

</div>

<script src="{{asset('public/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('public/vendors/popper.js/dist/umd/popper.min.js')}}"></script>

<script src="{{asset('public/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{asset('public/vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js')}}"></script>

<script src="{{asset('public/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/assets/js/main.js')}}"></script>

@endsection
