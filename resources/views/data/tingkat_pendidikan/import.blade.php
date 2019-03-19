@extends('layouts.dashboard_template')

@section('content')
        <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        {{ $page_title or "Page Title" }}
        <small>{{ $page_description or null }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard.profil')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('data.tingkat-pendidikan.index')}}">Tingkat Pendidikan</a></li>
        <li class="active">{{$page_title}}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    @include('partials.flash_message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                {{-- <div class="box-header with-border">
                     <h3 class="box-title">Aksi</h3>
                 </div>--}}
                <!-- /.box-header -->

                <!-- form start -->
                {!! Form::open( [ 'route' => 'data.tingkat-pendidikan.do_import', 'method' => 'post','id' => 'form-import', 'class' => 'form-horizontal form-label-left', 'files' => true ] ) !!}

                <div class="box-body">

                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="list_desa" class="control-label col-md-4 col-sm-3 col-xs-12">Desa</label>

                                <div class="col-md-8">
                                    <select class="form-control" id="list_desa" name="desa_id">
                                        @foreach(\App\Models\DataDesa::all() as $desa)
                                            <option value="{{$desa->desa_id}}">{{$desa->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="bulan" class="control-label col-md-4 col-sm-3 col-xs-12">Semester</label>

                                <div class="col-md-8">
                                    <select class="form-control" id="bulan" name="semester">
                                            <option value="1">Semester 1</option>
                                            <option value="2">Semester 2</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="list_year" class="control-label col-md-4 col-sm-3 col-xs-12">Tahun</label>

                                <div class="col-md-8">
                                    <select class="form-control" id="list_year" name="tahun">
                                        @foreach($years_list as $year)
                                            <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="data_file">Data Tingkat Pendidikan</label>

                                <div class="col-md-8">
                                    <input type="file" id="data_file" name="file" class="form-control" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="well">
                                <p>Instruksi Upload Data:</p>
                                <p>Silahkan download template upload data di sini: <a href="{{ asset('storage/template_upload/Format_Upload_Tingkat_Pendidikan.xlsx') }}">Download</a></p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="pull-right">
                        <div class="control-group">
                            <a href="{{ route('data.tingkat-pendidikan.index') }}">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Batal</button>
                            </a>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Import</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
@endsection
@include(('partials.asset_select2'))
@include(('partials.asset_datetimepicker'))
@push('scripts')
<script>
    $(function () {

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#showgambar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#foto").change(function () {
            readURL(this);
        });

        //Datetimepicker
        $('.datepicker').each(function () {
            var $this = $(this);
            $this.datetimepicker({
                format: 'YYYY-MM-D'
            });
        });

    })


</script>
@endpush