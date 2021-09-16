@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card-box">


            <h4 class="header-title m-t-0 m-b-30">پست جدید </h4>

            <form class="form-horizontal" method="post" action="{{route('event.store')}}" role="form">
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
                            <textarea name="body" id="elm1" class="form-control" rows="5"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Input Select</label>
                        <div class="col-sm-10">
                            <select class="js-example-basic-multiple" name="category[]" multiple="multiple">
                                @foreach($category as $cat)
                                <option value="{{$cat->id}}">{{$cat->title}}</option>

                                @endforeach
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

@section('js')
    <script src="{{asset('assets/plugins/tinymce/tinymce.min.js')}}"></script>

    <script>


        $(document).ready(function () {
            $('.js-example-basic-multiple').select2({
                placeholder: 'دسته بندی های ایونت ها....',
                allowClear: true
            });
            if($("#elm1").length > 0){
                tinymce.init({
                    selector: "textarea#elm1",
                    theme: "modern",
                    height:300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "rtl insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [
                        {title: 'Bold text', inline: 'b'},
                        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                        {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                        {title: 'Example 1', inline: 'span', classes: 'example1'},
                        {title: 'Example 2', inline: 'span', classes: 'example2'},
                        {title: 'Table styles'},
                        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                    ]
                });
            }
        });
    </script>
@endsection
