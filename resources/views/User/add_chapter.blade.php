@extends('layouts.app')
@section('content')
<!-- top tiles -->
<div class="col-md-8 col-sm-8" style="margin:auto">
    <!-- general form elements -->
    <div class="card card-primary" >
        <div class="card-header">
            <h3 class="card-title">chapter</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{url('user/save-chapter')}}" enctype="multipart/form-data">
        @csrf
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" style="display:none">
            <div class="card-body">
                <div class="form-group">
                    <label>Tên truyện</label>
                    <select name="Ma_truyen" class="form-control">
                        <?php foreach($data as $key => $truyens){ 
                            if($truyens->user_id == Auth::user()->id){?>
                        <option value="{{$truyens->Ma_truyen}}">{{$truyens->Ten_truyen}}</option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Mã chapter</label>
                    <input type="text" name="Ma_chap" class="form-control" placeholder="Mã chapter" required="required">
                </div>
                <div class="form-group">
                    <label>Tên chapter</label>
                    <input type="text" name="Ten_chap" class="form-control" placeholder="Tên chapter" required="required">
                </div>
                
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh 1<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_1" onchange="chooseFile(this,'Hinh_anh_1')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_1" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh 2<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_2" onchange="chooseFile(this,'Hinh_anh_2')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_2" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh 3<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_3" onchange="chooseFile(this,'Hinh_anh_3')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_3" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh 4<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_4" onchange="chooseFile(this,'Hinh_anh_4')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_4" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh  5<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_5" onchange="chooseFile(this,'Hinh_anh_5')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_5" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh  6<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_6" onchange="chooseFile(this,'Hinh_anh_6')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_6" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh  7<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_7" onchange="chooseFile(this,'Hinh_anh_7')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_7" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh  8<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_8" onchange="chooseFile(this,'Hinh_anh_8')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_8" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh  9<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_9" onchange="chooseFile(this,'Hinh_anh_9')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_9" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Ảnh  10<span class="required">*</span></label>
                    <br>
                    <input type="file" name="Hinh_anh_10" onchange="chooseFile(this,'Hinh_anh_10')" />
                    <div class="col-md-8 col-sm-10 " style="margin:auto;">
                        <p class="help-block"></p>
                        <img  class="image-fasle" id="Hinh_anh_10" style="width: inherit;" onerror="this.src='/admin_images/no-avatar.png'" />
                    </div>
                </div>
                
                
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" name="create_manga" class="btn btn-primary">Submit</button>
            </div>
        </form>
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