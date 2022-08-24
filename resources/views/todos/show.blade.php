@extends('app')

@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form action="{{ route('todos.update', [ 'id' => $todo->id, 'description' => $todo->description ]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
                
            @endif

            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Título de la tarea</label>
                <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
            </div>
                <textarea name="description" id="" cols="30" class="form-control" rows="10">{{ $todo->description }}</textarea>
              
              <button type="submit" class="btn btn-primary">Actualizar tarea</button>
        </form>

      
    </div>
@endsection