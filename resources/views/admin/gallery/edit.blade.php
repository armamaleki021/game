@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="card-box">

            <h4 class="header-title m-t-0 m-b-30">اضافه کردن تصاویر</h4>

            <form method="post" action="{{route('gallery.update',$gallery->id)}}" class="form-horizontal" role="form">
                @method('put')
                @csrf
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">تایتل</label>
                    <div class="col-md-10">
                        <input name="title" type="text" class="form-control" value="{{$gallery->title}}">
                        <i class="fa fa-envelope form-control-feedback l-h-34"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">متن جایگزین تصویر</label>
                    <div class="col-md-10">
                        <input name="alt" type="text" class="form-control" value="{{$gallery->alt}}">
                        <i class="fa fa-envelope form-control-feedback l-h-34"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">Text area</label>
                    <div class="col-md-10">
                        <textarea name="description" class="form-control" rows="5">{{$gallery->description}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-2"></label>
                    <button type="submit" class="btn col-md-10 btn-xs btn-purple waves-effect waves-light">ارسال
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
