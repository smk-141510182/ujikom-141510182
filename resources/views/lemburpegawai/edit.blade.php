@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Lembur Pegawai</div>

                <div class="panel-body">
                {!! Form::model($lemburpegawaiv,['method'=>'PATCH','route'=>['LemburPegawai.update',$lemburpegawaiv->id]])!!}
                    
                    <label>Nama Lembur</label>
                    <select name="kode_lembur_id" class="form-control" required>
                        
                        @foreach($kategorilemburv as $data)
                        <option value="{{$data->id}}">{{$data->kode_lembur}}</option>
                        @endforeach
                    </select><br>

                    <label>Nama Pegawai</label>
                    <select name="pegawai_id" class="form-control" required>
                        
                        @foreach($pegawaiv as $data)
                        <option value="{{$data->id}}">{{$data->User->name}}</option>
                        @endforeach
                    </select><br>

                    <div class="form-group">
                        {!! Form::label('Jumlah Jam','Jumlah Jam')!!}
                        {!! Form::text('jumlah_jam',null,['class'=>'form-control','required'])!!}
                    </div>
                    <button type="submit" class="btn btn-success">
                                    Update
                                </button>
                    {!! Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
