@extends('Admin.layout')
@section('content')
<!-- top tiles -->
<div class="col-md-12">
    
    <!-- /.card -->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách thể loại</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>Mã thể loại</th>
                        <th>Tên thể loại</th>
                        <th style="width: 150px">Công cụ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 0; ?>
                    <?php foreach ($data as $key => $theloai){
                        $num += 1 ?>
                    
                    <tr>
                        <td><?php echo $num ?></td>
                        <td>{{$theloai->Ma_the_loai}}</td>
                        <td>
                            <!-- <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                            </div> -->
                            {{$theloai->Ten_the_loai}}
                        </td>
                        <td><a href="" style="margin-right:5px"><i class="fas fa-edit"></i></a><a href="" style="color:red;margin-left:5px"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<button type="button" class="btn btn-block btn-outline-primary btn-lg" style="max-width:500px; margin:auto" onClick="document.location.href='/admin/them-the-loai'">Thêm thể loại</button>
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