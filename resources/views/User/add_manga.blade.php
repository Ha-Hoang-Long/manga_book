@extends('layouts.app')
@section('content')
<!-- top tiles -->
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Thêm truyện</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{url('user/save-manga')}}" enctype="multipart/form-data">
        @csrf
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" style="display:none">
            <div class="card-body">
                <div class="form-group">
                    <label>Mã truyện</label>
                    <input type="text" name="Ma_truyen" class="form-control" placeholder="Mã truyện">
                </div>
                <div class="form-group">
                    <label>Tên truyện</label>
                    <input type="text" name="Ten_truyen" class="form-control" placeholder="Tên truyện">
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    <select name="Ma_the_loai" class="form-control">
                        <?php foreach($the_loai as $key => $the_loais){ ?>
                        <option value="{{$the_loais->Ma_the_loai}}">{{$the_loais->Ten_the_loai}}</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mô tả nội dung chính</label>
                    <input type="text" name="Noi_dung" class="form-control" placeholder="">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh đại diện<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-6 ">
                        <input type="file" name="Hinh_anh" onchange="chooseFile(this)" required="required"/>
                        <p class="help-block">Example block-level help text here.</p>
                        <img height="200" id="image" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="create_manga" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->

    <!-- general form elements -->

    <!-- /.card -->

    <!-- Input addon -->

    <!-- /.card -->
    <!-- Horizontal Form -->

    <!-- /.card -->

</div>
<script>
    function chooseFile(fileIn) {
        if (fileIn.files && fileIn.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image').attr('src', e.target.result);
            }
            reader.readAsDataURL(fileIn.files[0]);
        } 
    }
</script>
<script>
    function addClass(elements, myClass) {

        // nếu ta có selector, nhận các elements đã chọn
        if (typeof (elements) === 'string') {
            elements = document.querySelectorAll(elements);
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
    addClass('#add-truyen', 'active');
    addClass('#menu-truyen', 'menu-open');
</script>
@endsection