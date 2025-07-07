@extends('Frontend.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <!-- Login Form -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Log Masuk</h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Kata Laluan</label>
                            <input type="password" name="password" class="form-control" required placeholder="Masukkan kata laluan">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Log Masuk</button>
                    </form>

                    <div class="text-center mt-3">
                        <a class="btn btn-link" data-bs-toggle="collapse" href="#registerForm" role="button" aria-expanded="false" aria-controls="registerForm">
                            Daftar Akaun Baru
                        </a>
                    </div>
                </div>
            </div>

            <!-- Collapsible Registration Form -->
            <div class="collapse mt-3" id="registerForm">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Pendaftaran Akaun</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Penuh</label>
                                <input type="text" name="name" class="form-control" required placeholder="Masukkan nama penuh">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required placeholder="Masukkan username">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kata Laluan</label>
                                <input type="password" name="password" class="form-control" required placeholder="Masukkan kata laluan">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sahkan Kata Laluan</label>
                                <input type="password" name="password_confirmation" class="form-control" required placeholder="Sahkan kata laluan">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Daftar Akaun</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
