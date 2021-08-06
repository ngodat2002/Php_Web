<?php
?>
@extends('layouts.app');
@section('content');
    <div class="panel-body">
        @include('errors.503')

        <form action="{{url('task')}}" method="post" class="form-horizontal">
            {{csrf_field()}}

            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>
                <div class="col-sm-6">
                    <input type="text"name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus">Add Task</i>
                    </button>
                </div>
            </div>

        </form>
{{--        hienthi task hien tai trong database--}}
            @if(count($task)>0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Task
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <thead>
                            <td>Task</td>
                            <td>&nbsp;</td>
                        </thead>
                        <tbody>
                            @foreach($task as $tasks)
                                <tr>
                                    <td class="table-text">
                                        <div>{{$tasks->name}}</div>
                                    </td>
                                    <td>
                                        <form action="/task/{{$tasks->id}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button>Delete Task</button>
                                            <input type="hidden" name=" method" value="DELETE">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
