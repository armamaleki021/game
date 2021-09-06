@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">


                <h4 class="header-title m-t-0 m-b-30">سات دسته بندی جدید</h4>

                <form action="{{route('category.store')}}" method="post" class="form-horizontal" role="form">
                    @csrf
                    <div class="form-group has-feedback">
                        <label class="col-md-2 control-label">تایتل</label>
                        <div class="col-md-10">
                            <input name="title" type="text" class="form-control" placeholder="Custom icons">
                            <i class="fa fa-envelope form-control-feedback l-h-34"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">توضیحات</label>
                        <div class="col-md-10">
                            <textarea name="description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">گالری ای دی</label>

                        <div class="col-sm-10">
                            <select name="gallery_id" class="form-control">
                                <option value="1">gallery_id=1</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label"></label>

                        <button type="submit" class="btn col-md-10 btn-xs btn-purple waves-effect waves-light">ساخت
                        </button>
                    </div>

                </form>
            </div>
        </div>
        <!-- end col -->



@endsection
