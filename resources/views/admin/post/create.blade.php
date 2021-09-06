@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card-box">


            <h4 class="header-title m-t-0 m-b-30">پست جدید </h4>

            <form class="form-horizontal" method="post" action="{{route('post.store')}}" role="form">
                @csrf
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">تایتل </label>
                    <div class="col-md-10">
                        <input type="text" name="title" class="form-control" placeholder="تایتل....">
                        <i class="zmdi zmdi-view-subtitles form-control-feedback l-h-34"></i>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 m-t-10 control-label">Text area</label>
                        <div class="col-md-10 m-t-10">
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Input Select</label>
                        <div class="col-sm-10">
                            <select name="gallery_id" class="form-control">
                                <option value="1">gallery_id=1</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Input Select</label>
                        <div class="col-sm-10">
                            <select name="category_id" class="form-control">
                                <option value="1">'category_id=1'</option>
                            </select>

                        </div>
                    </div>

                    <label class="col-md-2  control-label"> </label>

                    <button type="submit" class="btn col-md-10 btn-xs btn-purple waves-effect waves-light">ارسال
                    </button>
                </div>

            </form>
        </div>
        <div></div>
    </div>

@endsection
