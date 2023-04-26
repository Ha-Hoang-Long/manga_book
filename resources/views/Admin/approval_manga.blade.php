
@section('link')
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{URL::to('/admin/dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active">approval-manga</li>
    </ol>
</div>
@endsection
@extends('Admin.layout')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Duyệt truyện</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <?php if($manga->count() > 0){ ?>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Mã truyện</th>
                            <th>Tên truyện</th>
                            <th>Ngày đăng</th>
                            <th>Người đăng</th>
                            <th>Trạng thái</th>
                            <th>Hình ảnh</th>
                            <th>Nội dung chính</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manga as $key => $truyen)
                        <tr>
                            <td style="vertical-align: middle;">{{$truyen->Ma_truyen}}</td>
                            <td style="vertical-align: middle;">{{$truyen->Ten_truyen}}</td>
                            <td style="vertical-align: middle;">{{$truyen->created_at}}</td>
                            <td style="vertical-align: middle;"><span class="tag tag-success">{{$truyen->user_id}}</span></td>
                            <td style="vertical-align: middle;"><select name="" class="form-control" onchange="location = this.value;">
                                <?php foreach ($status as $key => $statuss) {
                                ?>
                                @if ($statuss->id == $truyen->Status)
                                    <option value="" name1="{{$truyen->Status}}" selected >{{$statuss->name}}</option>
                                @else
                                    <option value="{{URL::to('/admin/approval-change-manga/'.$truyen->Ma_truyen.'/'.$statuss->id)}}" name1="{{$truyen->Status}}" >{{$statuss->name}}</option>
                                @endif

                                <?php }?>
                            </select></td>
                            
                            <td style="vertical-align: middle;"><img style="width: 120px;" src="https://lh3.googleusercontent.com/d/{{$truyen->Hinh_anh_truyen}}" alt=""></td>
                            <td style="vertical-align: middle;">{{$truyen->Noi_dung}}</td>
                            <!-- <td style="vertical-align: middle;"><a href="" style="margin-right:5px"><i class="fas fa-edit"></i></a><a href="" style="color:red;margin-left:5px"><i class="fas fa-trash-alt"></i></a></td> -->
                        </tr>    
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
            <?php }
            else{?>
            <div style="margin:auto;font-size:15pt;color:#9BA4B5">Không có bài đăng mới</div>
            <?php } ?>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Duyệt chapter truyện</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <?php if($chapter->count() > 0){ ?>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>Tên truyện</th>
                            <th>Mã chapter</th>
                            <th>Tên chapter</th>
                            <th>Ngày đăng</th>
                            <th>Người đăng</th>
                            <th>Trạng thái</th>
                            <!-- <th>Công cụ</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chapter as $key => $chapters)
                        <tr>
                            <td style="vertical-align: middle;">{{$chapters->Ten_truyen}}</td>
                            <td style="vertical-align: middle;">{{$chapters->Ma_chap}}</td>
                            <td style="vertical-align: middle;">{{$chapters->Ten_chap}}</td>
                            <td style="vertical-align: middle;">{{$chapters->created_at}}</td>
                            <td style="vertical-align: middle;"><span class="tag tag-success">{{$chapters->user_id}}</span></td>
                            <td><select name="" class="form-control" onchange="location = this.value;">
                                <?php foreach ($status as $key => $statuss) {
                                ?>
                                @if ($statuss->id == $chapters->Status)
                                    <option value="" name1="{{$chapters->Status}}" selected >{{$statuss->name}}</option>
                                @else
                                    <option value="{{URL::to('/admin/approval-change-chapter/'.$chapters->Ma_chap.'/'.$statuss->id)}}" name1="{{$chapters->Status}}" >{{$statuss->name}}</option>
                                @endif

                                <?php }?>
                            </select></td>
                            
                            <!-- <td style="vertical-align: middle;"><a href="" style="margin-right:5px"><i class="fas fa-edit"></i></a><a href="" style="color:red;margin-left:5px"><i class="fas fa-trash-alt"></i></a></td> -->
                            <td style="vertical-align: middle;"><a href="{{URL::to('/admin/detail-chapter/'.$chapters->Ma_chap)}}" ><i class="fas fa-info-circle fa-lg" style="color: #43fa00;"></i></a><br>Xem nội dung</td>
                        </tr>    
                        @endforeach
                        
                        
                    </tbody>
                </table>
            </div>
            <?php }
            else{?>
            <div style="margin:auto;font-size:15pt;color:#9BA4B5">Không có bài đăng mới</div>
            <?php } ?>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
      <div class="login-box" style="margin:auto">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin  </b>MANGA BOOK</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/admin/login" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password"     class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
      </div>
      
    </div>
  </div>
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

        addClass('#duyet_bai','active');
        
    </script>
@endsection