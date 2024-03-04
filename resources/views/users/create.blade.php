@extends('components.layout')    
@yield('content')
    <div class="container py-5 w-25">
        <h1 class="text-center mt-5 text-white">Cadastro de Usuário</h1>
        <form action="{{route('users.store')}}" method="post" class="mt-5">
            @csrf
            <!-- Nome -->
            <div class="form-group">
                <label for="name" class="text-white">Nome:</label>
                <input type="text" class="form-control bg-dark text-white @error('name') @enderror" id="name" name="name" required>
                <strong>
                    <p class="text-white">{{$errors->first('name')}}</p>
                </strong>
            </div>
            
            <!-- Email -->
            <div class="form-group">
                <label for="email" class="text-white">Email:</label>
                <input type="email" class="form-control bg-dark text-white" id="email" name="email" required>
                <strong class="text-white">
                    {{$errors->first('email')}}
                </strong>
            </div>

            {{-- Senha --}}
            <div class="form-group">
                <label for="password" class="text-white">Senha:</label>
                <input type="password" id="password" name="password" class="form-control bg-dark text-white" required>
                <strong class="text-white">
                    {{$errors->first('password')}}
                </strong>
            </div>
            
            <!-- Profissão -->
            <div class="form-group">
                <label for="profession" class="text-white">Profissão:</label>
                <input type="text" class="form-control bg-dark text-white" id="profession" name="profession" required>
                <strong class="text-white">
                    {{$errors->first('profession')}}
                </strong>
            </div>
            
            <!-- Data de Nascimento -->
            <div class="form-group">
                <label for="date_birth" class="text-white">Data de Nascimento:</label>
                <input type="date" class="form-control bg-dark text-white" id="date_birth" name="date_birth" required>
                <strong class="text-white">
                    {{$errors->first('date_birth')}}
                </strong>
            </div>
            
            <!-- Botão de Submit -->
            <button type="submit" class="btn btn-dark w-100">Cadastrar</button>
        </form>
        <a href="{{Route('users.index')}}"><button class="btn btn-dark">Voltar</button></a>
    </div>

