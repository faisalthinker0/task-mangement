@extends('layouts.main')

@section('content')

    <div class="content">
        <div class="animated fadeIn">


            <div class="row">

                @if($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach

                @endif
                @foreach($tasks as $task)
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-header"><strong>Tasks</strong><small> Form</small></div>
                            <div class="card-body card-block">
                                <form action="{{route('editTask')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$task->id}}">
                                    <div class="form-group"><label for="title"
                                                                   class=" form-control-label">Title</label><input
                                            type="text" id="company" name="title" placeholder="Enter task title"
                                            class="form-control" value="{{$task->title}}">
                                    </div>
                                    <div class="form-group"><label for="description"
                                                                   class=" form-control-label">Description</label><input
                                            type="text" id="vat" name="description"
                                            placeholder="Enter description for task"
                                            class="form-control" value="{{$task->description}}"></div>

                                    <div class="form-group">
                                        <div class="col col-md-3"><label for="select"
                                                                         class=" form-control-label"
                                                                         value="{{$task->status}}">Status</label>
                                        </div>
                                        <div class="col-12 col-mffd-9">
                                            <select id="select" class="form-control"
                                                    name="status">
                                                @if($task->status == 'In Progress')
                                                    <option value="In Progress" selected>In Progress</option>
                                                    <option value="Completed">Completed</option>
                                                @else
                                                    <option value="Completed" selected>Completed</option>
                                                    <option value="In Progress">In Progress</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group"><label for="progress"
                                                                   class=" form-control-label">Progress</label><input
                                            type="number" id="progress" name="progress" placeholder="Progress %"
                                            class="form-control" value="{{$task->progress}}"></div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit" value="submit">submit</button>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>


            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>



@endsection
