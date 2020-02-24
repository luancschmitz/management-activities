@extends('base.layout')
@section('content')
    <h1>Enviar arquivo csv para cadastrar os dados já existentes</h1>
    <form name="uploadFile" method="POST" action="{{route('system.management.upload')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file">File</label>
            <input type="file" name="fileCsv">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar Arquivo</button>
        </div>
    </form>
@endsection
