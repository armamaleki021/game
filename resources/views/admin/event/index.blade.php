@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')

    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="m-b-30">
                            <a href="{{route('event.create')}}" id="addToTable" class="btn btn-primary waves-effect waves-light">ارسال ایونت جدید <i
                                    class="fa fa-plus"></i></a>
                        </div>
                    </div>
                </div>

                <div class="editable-responsive">
                    <div id="datatable-editable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_length" id="datatable-editable_length"><label>Show <select
                                            name="datatable-editable_length" aria-controls="datatable-editable"
                                            class="form-control input-sm">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div>
                            </div>
                            <div class="col-sm-6">
                                <div id="datatable-editable_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="form-control input-sm" placeholder=""
                                            aria-controls="datatable-editable"></label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-striped dataTable no-footer" id="datatable-editable"
                                       role="grid" aria-describedby="datatable-editable_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-editable"
                                            rowspan="1" colspan="1" style="width: 199px;" aria-sort="ascending"
                                            aria-label="Rendering engine: activate to sort column descending">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1"
                                            colspan="1" style="width: 263px;"
                                            aria-label="Browser: activate to sort column ascending">title
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1"
                                            colspan="1" style="width: 239px;"
                                            aria-label="Platform(s): activate to sort column ascending">description
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1"
                                            colspan="1" style="width: 239px;"
                                            aria-label="Platform(s): activate to sort column ascending">category
                                        </th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 99px;"
                                            aria-label="Actions">user
                                        </th> <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 99px;"
                                            aria-label="Actions">Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($event as $po)
                                        <tr class="gradeA odd" role="row">
                                            <td class="sorting_1">{{$po->id}}</td>
                                            <td class="sorting_1">{{$po->title}}</td>
                                            <td>{!! Illuminate\Support\Str::limit($po->body, 50) !!}</td>
                                            <td>
{{--                                                @foreach($po->category as $category)--}}
{{--                                                    <span class="btn btn-default" >{{$category->title}}</span>--}}
{{--                                                @endforeach--}}
                                            </td>
                                            <td>{{$po->user->name}}</td>
                                            <td class="actions">


                                                <a href="{{route('event.edit', $po->id)}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <a onclick="event.preventDefault();document.getElementById('event-delete-{{$po->id}}').submit()" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                                <form method="post" action="{{route('event.destroy', $po->id)}}" id="event-delete-{{$po->id}}">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="dataTables_info" id="datatable-editable_info" role="status"
                                     aria-live="polite">Showing 1 to 10 of 57 entries
                                </div>
                            </div>
                            {{$event->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: panel body -->

    </div> <!-- end panel -->
    </div>
@endsection
