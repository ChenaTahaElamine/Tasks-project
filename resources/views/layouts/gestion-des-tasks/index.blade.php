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
                                            {!! $task->status !!}
                                            @if ($task->status == 'Pas-applique')
                                                <a href="{{ route('task.edit', ['tasks' => $task->id]) }}"
                                                    class="btn btn-success" style="margin-left: 15px">
                                                    Appliquer
                                                </a>
                                            @endif

                                            <a href="{{ route('task.destroy', ['tasks' => $task->id]) }}"
                                                class="btn btn-danger" style="margin-left: 15px">
                                                Supprimer
                                            </a>
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
