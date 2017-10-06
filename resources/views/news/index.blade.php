@extends('layouts.app2')

@section('css')
<link href="{{ asset('public/assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Berita</span>
                </div>
                <div class="tools"> </div>
            </div>
            <a class="btn btn-large green-meadow" href="{{ url('berita/form') }}">+ Tambah Berita</a>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_2">
                    <thead>
                        <tr>
                            <th style="display: none"> </th>
                            <th class="none">Judul Berita</th>
                            <th class="none">Cover Berita</th>
                            <th class="none">Isi Berita</th>
                            <th class="none">Status Approval</th>
                            <th class="none">ID User Pembuat</th>
                            <th class="none">ID User Approval</th>
                            <th>Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $data as $list )
                        <tr class="odd gradeX">
                            <td style="display: none"></td>
                            <td>{{ $list->judul_berita}}</td>
                            <td>
                                <img src="{{ asset('') }}{{$list->cover_berita}}" width="200px" height="140px" />
                            </td>
                            <td style="">{{ strip_tags($list->isi_berita) }}</td>
                            <td><?php if($list->status_approval == 1) { echo 'Sudah'; } else echo 'Belum'; ?></td>
                            <td>{{ $list->id_user_create }}</td>
                            <td>{{ $list->id_user_approval }}</td>
                            <td>
                                <a class="btn btn-xs default" href="{{ url('berita/edit/'.$list->id) }}">Edit Berita</a>
                                <a class="btn btn-xs red" href="{{ url('berita/delete/'.$list->id) }}" 
                                    onclick="return confirm('Anda yakin akan menghapus ini?');">Hapus Berita</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
    
</div>
@endsection

@section('js')
	<script src="{{ asset('public/assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/pages/scripts/table-datatables-managed.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
@endsection