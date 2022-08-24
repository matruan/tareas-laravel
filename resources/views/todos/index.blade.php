@extends('app')

@section('content')
  <!-- <div class="container w-25 border p-4 mt-4"> -->
  <div class="container">
    @if (session('success'))
      <h6 class="alert alert-success">{{ session('success') }}</h6>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif


    <form action="{{ route('todos.store') }}" method="POST">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Título de la tarea</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="mb-3">
        <label for="title" class="form-label">Descripción de la tarea</label>
        <input type="text" name="description" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary mb-3">Crear nueva tarea</button>
    </form>

    <h2>Tareas pendientes</h2>
    <div>
      @foreach ($todos as $todo)
        <div class="row p-2 justify-content-around border align-items-center border-dark rounded my-2 w-50">
          <div class="col-sm">
            <a
              href="{{ route('todos.update', ['id' => $todo->id, 'description' => $todo->description]) }}">{{ $todo->title }}</a>
          </div>
          <div class="col-sm">
            {{ $todo->description }}
          </div>
          <div class="col-sm">
            <form action="{{ route('todos.destroy', [$todo->id]) }}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Eliminar</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
