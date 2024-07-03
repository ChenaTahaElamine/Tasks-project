@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="card">
                <div class="card-body">

                    @if (count($tasks) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">titre</th>
                                    <th scope="col">une description</th>
                                    <th scope="col">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th scope="row">{!! $task->id !!}</th>
                                        <td>{!! $task->titre !!}</td>
                                        <td>{!! $task->description !!}</td>
                                        <td>
                                            {!! $task->status  !!}
                                            @if ($task->status == 'Pas-applique')
                                                
                                                <form action="{{ route('task.update', ['tasks' => $task->id,"new_stauts"=>"applique"]) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    {{-- <input type="hidden" name="new_status" value="applique"> --}}
                                                    <button type="submit" class="btn btn-success"
                                                        style="margin-left: 15px">Appliquer</button>
                                                </form>
                                            @endif

                                            <form action="{{ route('task.destroy', ['tasks' => $task->id]) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="margin-left: 15px">Supprimer</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center">
                            <br><br>
                            <h1>
                                Il semble qu'il n'y ait pas encore de task
                            </h1>
                            <br><br>
                        </div>
                    @endif



                </div>
                <div class="card-footer">
                    @empty($tasks->links())
                        {{-- $variable n'existe pas ou est vide --}}
                    @else
                        {{-- $variable existe et n'est pas vide --}}
                        <div class="card-footer">
                            <div class="text-center">
                                {{ $tasks->links() }}
                            </div>
                        </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>

@endsection
