@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card-box">


                <h4 class="header-title m-t-0 m-b-30">ساخت دسته بندی جدید</h4>

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
                            <textarea name="body" id="elm1" class="form-control" rows="5"></textarea>
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
