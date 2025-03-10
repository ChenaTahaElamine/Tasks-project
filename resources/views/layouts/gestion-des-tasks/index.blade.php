@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if (count($tasks) > 0)
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <h3>Ce sont toutes vos tâches monsieur {!! Auth::user()->nom !!} {!! Auth::user()->prenom !!}
                                    </h3>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" style="color: white">id</th>
                                    <th scope="col" style="color: white">titre</th>
                                    <th scope="col" style="color: white">une description</th>
                                    <th scope="col" style="color: white">status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <th scope="row" style="color: white">{!! $task->id !!}</th>
                                        <td style="color: white">{!! $task->titre !!}</td>
                                        <td style="color: white">{!! $task->description !!}</td>
                                        <td style="color: white">
                                            {!! $task->status !!}
                                            @if ($task->status == 'Pas-applique')
                                                <form
                                                    action="{{ route('task.update', ['tasks' => $task->id, 'new_stauts' => 'applique']) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('PUT')
                                                    {{-- <input type="hidden" name="new_status" value="applique"> --}}
                                                    <button type="submit" class="btn btn-success"
                                                        style="margin-left: 15px;color: white">Appliquer</button>
                                                </form>
                                            @else
                                                <div class="" style="display:inline;margin-right: 137px"></div>
                                            @endif

                                            <form action="{{ route('task.destroy', ['tasks' => $task->id]) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    style="margin-left: 15px;color: white">Supprimer</button>

                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{-- @php
                        $links = $tasks->links();

                    @endphp --}}


                    {{-- <div class="card-footer"> --}}
                    <div class="container-fluid ">
                        <div class="text-center">
                            <div style="color: white;">{{ $tasks->links() }}</div>
                        </div>
                    </div>

                    {{-- </div> --}}


                </div>
            @else
                <div class="text-center">
                    <br><br>
                    <h1 style="color: white">
                        Il semble qu'il n'y ait pas encore de task
                    </h1>
                    <br><br>
                </div>
            @endif
            {{--  --}}

            {{--  --}}
        </div>
    </div>

@endsection
