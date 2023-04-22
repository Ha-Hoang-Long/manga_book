
@section('link')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{URL::to('/admin/list-chapter/'.$data[0]->Ma_truyen)}}">list-chapter</a></li>
        <li class="breadcrumb-item active">detail-chapter</li>
    </ol>
</div>
@endsection
@extends('Admin.layout')
@section('content')
<!-- top tiles -->
<div class="col-md-8 col-sm-8" style="margin:auto">
    <!-- general form elements -->
    <div class="card card-primary" >
        <div class="card-header">
            <h3 class="card-title">Chapter - {{$data[0]->Ten_chap}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php   $i = 1;
                $hinh = 'Hinh_anh_';
                $hinh_anh = 'Hinh_anh_';
        for($i = 1; $i <= 20; $i++){
            $hinh_anh = $hinh."$i";
            if($data[0]->$hinh_anh != null){
            
        ?>
        
        <div class="col-md-8 col-sm-10 " style="margin:auto;">
            <p class="help-block"></p>
            <img style="width: inherit;" src="https://lh3.googleusercontent.com/d/{{$data[0]->$hinh_anh}}" alt="">
        </div>
        <?php } 
        }
        ?>
    </div>


</div>
<style>
    .image-true{
        display: block;
    }
    .image-fasle{
        display: none;
    }
</style>
<script>
    function chooseFile(fileIn,names) {
        console.log(names);
        if (fileIn.files && fileIn.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#'+names).attr('src', e.target.result);
            }
            reader.readAsDataURL(fileIn.files[0]);
            document.getElementById(names).classList.remove("image-fasle");
            addClass('#'+names, 'image-true');
        } 
    }
</script>
<script>
    function addClass(elements, myClass) {

        // nếu ta có selector, nhận các elements đã chọn
        if (typeof (elements) === 'string') {
            
            elements = document.querySelectorAll(elements);
            console.log(elements);
        }

        // nếu ta chỉ có một dom element, biến thành array để đơn giản hóa hành vi
        else if (!elements.length) { elements = [elements]; }

        // thêm class vào tất cả element đã chọn
        for (var i = 0; i < elements.length; i++) {
            if (!(' ' + elements[i].className + ' ').indexOf(' ' + myClass + ' ') > -1) {
                elements[i].className += ' ' + myClass;
            }
        }
    }

    addClass('#truyen', 'active');
    addClass('#add-chapter', 'active');
    addClass('#menu-truyen', 'menu-open');
</script>
@endsection