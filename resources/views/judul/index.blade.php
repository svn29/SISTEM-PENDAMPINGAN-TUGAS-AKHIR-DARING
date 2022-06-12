@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            Pengajuan Judul
                        </div>
                        <div>
                            <a href="{{ route('judul.create') }}" class="btn btn-primary">Ajukan Judul</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pengaju</th>
                                <th>Dosen PA</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($juduls as $item)
                                <tr>
                                    <td>
                                        {{$loop->iteration}}
                                    </td>
                                    <td>
                                        {{$item->judul}}
                                    </td>
                                    <td>
                                        {{$item->pengaju_id}}
                                    </td>
                                    <td>
                                        {{$item->ppa_id}}
                                    </td>
                                    <td>
                                        {{$item->status}}
                                    </td>
                                    <td>
                                        <a href="{{ route('judul.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('judul.validasi.put', $item->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="dikonfirmasi">
                                            <button class="btn btn-success">Setuju</button>
                                        </form>
                                        <form action="{{ route('judul.validasi.put', $item->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="status" value="butuh revisi">
                                            <button class="btn btn-danger">Tolak</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>
                                        Belum Ada Data
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
