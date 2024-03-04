@extends('components.layout')
  @yield('content')
  <style>
    /* Defina uma altura fixa para os cabeçalhos (th) */
    .table-fixed th {
        height: 50px; /* Ajuste a altura conforme necessário */
    }

    /* Defina a mesma altura para as células (td) */
    .table-fixed td {
        height: 50px; /* Ajuste a altura conforme necessário */
        vertical-align: middle; /* Centralize o conteúdo verticalmente */
    }
  </style>
    <div class="container py-5">
        <!-- Adicione a classe 'text-center' ao cabeçalho -->
        <h1 class="text-center mb-5 text-white">Lista de Usuários</h1>
        <form action="{{route('users.create')}}"> 
          <button class="btn btn-dark" type="submit">Cadastrar Usuário</button>
        </form>
        
        <!-- Adicione a classe 'table-fixed' à tabela para fixar a largura das colunas -->
        <table class="table table-bordered table-dark mx-auto table-fixed w-500">
            <col style="width: 25%">
            <col style="width: 25%">
            <col style="width: 25%">
            <col style="width: 25%">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Profissão</th>
                    <th scope="col" class="text-center">Data de nascimento</th>
                    <th scope="col" class="text-center">Opções</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              {{-- @dd($user->id) --}}
                <tr>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">{{$user->profession}}</td>
                    <td class="text-center">{{$user->date_birth}}</td>
                    <td class="d-flex p-2">
                      <form action="{{url("users/edit/$user->id")}}">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm mr-2 p1">Editar</button>
                      </form>
                      <form method="post" action="{{url("users/destroy/$user->id")}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                      </form>
                    </td>
                  </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <!-- Adicione os links para o Bootstrap JS, se necessário -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
