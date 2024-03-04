@extends('components.layout')    
@yield('content')
    <div class="container py-5 w-25">
        <h1 class="text-center mt-5 text-white">Cadastro de Usuário</h1>
        <form action="{{url("users/update/{$user->id}")}}" method="post" class="mt-5">
            @csrf
            <!-- Nome -->
            <div class="form-group">
                <label for="name" class="text-white">Nome:</label>
                <input type="text" class="form-control bg-dark text-white" id="name" name="name" value="{{$user->name}}" required>
            </div>
            
            <!-- Profissão -->
            <div class="form-group">
                <label for="profession" class="text-white">Profissão:</label>
                <input type="text" class="form-control bg-dark text-white" id="profession" name="profession" value="{{$user->profession}}" required>
            </div>
            
            <!-- Data de Nascimento -->
            <div class="form-group">
                <label for="date_birth" class="text-white">Data de Nascimento:</label>
                <input type="date" class="form-control bg-dark text-white" id="date_birth" name="date_birth" value="{{$user->date_birth}}" required>
            </div>
            
            <!-- Botão de Submit -->
            <button type="submit" class="btn btn-dark w-100">Confirmar</button>
        </form>
        <a href="{{Route('users.index')}}"><button class="btn btn-dark">Voltar</button></a>
    </div>

