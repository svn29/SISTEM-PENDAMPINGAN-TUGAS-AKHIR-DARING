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
                            <a href="{{ route('judul.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('judul.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pengaju_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="status" value="proses">
                        <div class="form-group">
                            <input type="text" name="judul" placeholder="Judul" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <select name="ppa_id" id="" class="form-control">
                                <option value="">Pilih Dosen PA</option>
                                @foreach ($ppas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
