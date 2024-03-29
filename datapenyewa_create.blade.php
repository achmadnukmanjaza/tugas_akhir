@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Tambah datapenyewa</h1>
            <hr>
            @if($errors->any())
                <div class="alert-danger">
                @foreach($errors->all() as $error)
                    <li><strong>{{ $error }}</strong></li>
                @endforeach
                </div>
            @endif 

            <form action="{{ route('datapenyewa.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="form-group">
                    <label for="nama">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for=nohp">Nohp:</label>
                    <input type="text" class="form-control" id="nohp" name="nohp">
                </div>
                <div class="form-group">
                    <label for="nama">Alamat:</label>
                    <textarea class="form-control" id="alamat" name="alamat"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancle</button>
                </div>
            </form>
        </div>
    </section>
@endsection