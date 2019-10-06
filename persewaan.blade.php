@extends('template')
@section('content')
<section class="main-section">
    <div class="content">
        <h1>Data persewaaan</h1>
        @if(Session::has('alert_message'))
        <div class="alert alert-success">
            <strong>{{ Session::get('alert_message') }}</strong>
        </div>
        @endif
        <hr>
        <a href="{{ route('persewaan.create') }}" class="btn btn-sm btn-primary">Tambah persewaan</a>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>id</th>
                <th>kd_barang</th>
                <th>nama_barang</th>
                <th>stok</th>
                <th>harga</th>
            </tr>
            </thead>
            <tbody>
            @php $no = 2; @endphp
            @foreach($data as $datas)
                <tr>
                    <td>{{ $datas->id }}</td>
                    <td>{{ $datas->kd_barang }}</td>
                    <td>{{ $datas->nama_barang }}</td>
                    <td>{{ $datas->stok }}</td>
                    <td>{{ $datas->harga }}</td>
                    <td>

                    <?php if(Session::get('multilevel')=="mimin"){ ?>
                        <form action="{{ route('persewaan.destroy', $datas->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ route('persewaan.edit', $datas->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </form>
                    <?php }?>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div> 
</section>
@endsection