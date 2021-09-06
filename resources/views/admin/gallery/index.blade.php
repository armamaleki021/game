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
                            <a href="{{route('gallery.create')}}" id="addToTable" class="btn btn-primary waves-effect waves-light">اضافه کردن گالری <i
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
                                            aria-label="Rendering engine: activate to sort column descending">Rendering
                                            engine
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1"
                                            colspan="1" style="width: 263px;"
                                            aria-label="Browser: activate to sort column ascending">Browser
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-editable" rowspan="1"
                                            colspan="1" style="width: 239px;"
                                            aria-label="Platform(s): activate to sort column ascending">Platform(s)
                                        </th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 99px;"
                                            aria-label="Actions">Actions
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gallery as $gal)
                                        <tr class="gradeA odd" role="row">
                                            <td class="sorting_1">{{$gal->title}}</td>
                                            <td>{{ Illuminate\Support\Str::limit($gal->description, 20) }}</td>
                                            <td>{{$gal->user->name}}</td>
                                            <td class="actions">

                                                <a href="{{route('gallery.edit',$gal->id)}}" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
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
                            {{$gallery->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: panel body -->

        </div> <!-- end panel -->
    </div>
@endsection
