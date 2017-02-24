@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Penggajian</div>

                <div class="panel-body">
                    <a href="{{url('/Penggajian/create')}}" class="btn btn-md btn-block">Tambah penggajian</a><br>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tunjangan Pegawai Id</td>
                                <td>Jumlah Jam Lembur</td>
                                <td>Jumlah Uang Lembur</td>
                                <td>Gaji Pokok</td>
                                <td>Total Gaji</td>
                                <td>Tanggal Pengambilan</td>
                                <td>Status Pengembalian</td>
                                <td>Status Penerima</td>
                                <td colspan="2">Pilihan:</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($penggajianv as $data)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{ $data->tunjangan_pegawai_id }}</td>
                                    <td>{{ $data->jumlah_jam_lembur }}</td>
                                    <td>{{ $data->jumlah_uang_lembur }}</td>
                                    <td>{{ $data->gaji_pokok }}</td>
                                    <td>{{ $data->total_gaji }}</td>
                                    <td>{{ $data->tanggal_pengambilan }}</td>
                                    <td>{{ $data->status_pengembalian }}</td>
                                    <td>{{ $data->status_penerima }}</td>
                                    <td><a href="{{route('penggajian.edit',$data->id)}}" class="btn btn-warning">Ubah</a></td>
                                    <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['penggajian.destroy', $data->id]]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
