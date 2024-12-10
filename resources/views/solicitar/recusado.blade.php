@extends('layouts.darkMode')

@section('content_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/custom-dark-mode.css') }}">
<h1>Solicitação do {{$solicitar->user->name}}</h1>

<script>
    setTimeout(() => {
        const successMessage = document.getElementById("message");
        if (successMessage) {
            successMessage.style.transition = "opacity 0.5s ease";
            successMessage.style.opacity = "0";
            setTimeout(() => successMessage.remove(), 500);
        }
    }, 5000);
</script>
@if(session('success'))
<div class="alert alert-success" id="message" role="alert">
    {{ session('success') }}
</div>
@endif
@endsection

@section('content')
<div class="content">
    <div class="card">
        <div class="card-body">
            <div class="col-md-6">
                <h3>Solicitação do {{ $solicitar->veiculo->marca}} {{ $solicitar->veiculo->modelo}} - Recusada</h3>
                <form action="{{ route('solicitar.motivoRecusado', ['id' => $solicitar->id]) }}" method="POST">
                    @csrf
                    <label for="motivo_recusado" class="label1">Porque foi recusado?</label>
                    <input type="text" class="form-control @error('motivo_recusado') is-invalid @enderror" id="motivo_recusado" name="motivo_recusado" required>
                    @error('motivo_recusado')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

            </div>
        </div>

        <div class="card-footer" id="teste">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
        </form>
    </div>
</div>

@endsection