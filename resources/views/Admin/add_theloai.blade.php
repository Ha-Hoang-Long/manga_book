@extends('Admin.layout')
@section('content')
<!-- top tiles -->
<div class="col-md-6" style="margin:auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm thể loại</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('admin/save-the-loai')}}" method="POST">
                            @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Mã thể loại</label>
                                        <input type="text" name="Ma_the_loai" class="form-control" 
                                            placeholder="Mã thể loại">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên thể loại</label>
                                        <input type="text" name="Ten_the_loai" class="form-control" 
                                            placeholder="Tên thể loại">
                                    </div>
                                    
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
        function addClass(elements, myClass) {

            // nếu ta có selector, nhận các elements đã chọn
            if (typeof(elements) === 'string') {
            elements = document.querySelectorAll(elements);
            }

            // nếu ta chỉ có một dom element, biến thành array để đơn giản hóa hành vi
            else if (!elements.length) { elements=[elements]; }

            // thêm class vào tất cả element đã chọn
            for (var i=0; i<elements.length; i++) {
            if (!(' '+elements[i].className+' ').indexOf(' '+myClass+' ') > -1) {
                elements[i].className += ' ' + myClass;
            }
            }
        }

        addClass('#truyen','active');
        addClass('#add-theloai','active');
        addClass('#menu-truyen','menu-open');
    </script>
@endsection