@extends('mahasiswa.layout')

@section('content')
    <div class="row">
        <div class="col-lg-122 margin-tb">
            <div>
                <h2>Edit Mahasiswa</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('mahasiswa.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problem with your input.<br><br>
            <ul>
                @foreach ($error->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama :</strong>
                    <input type="text" name="nama" value="{{ $mahasiswa->nama }}" class="form-contorl"
                        placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kelas :</strong>
                    <input type="text" name="kelas" value="{{ $mahasiswa->kelas }}" class="form-contorl"
                        placeholder="Kelas">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
@endsection
