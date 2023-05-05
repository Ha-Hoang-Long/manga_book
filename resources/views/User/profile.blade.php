@extends('layout')

@section('content')
<div class="container" style="margin-top: 50px;margin-bottom:50px">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="card-title mb-4">
            <div class="d-flex justify-content-start">
              <div class="image-container">
                <img src="http://placehold.it/150x150" id="imgProfile" style="width: 150px; height: 150px"
                  class="img-thumbnail" />
                <div class="middle">
                  <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                  <input type="file" style="display: none;" id="profilePicture" name="file" />
                </div>
              </div>
              <div class="userData ml-3">
                <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a href="javascript:void(0);">{{
                    Auth::user()->name }}</a></h2>
                <!-- <h6 class="d-block"><a href="javascript:void(0)">1,500</a> Video Uploads</h6>
                <h6 class="d-block"><a href="javascript:void(0)">300</a> Blog Posts</h6> -->
              </div>
              <div class="ml-auto">
                <input type="button" class="btn btn-primary d-none" id="btnDiscard" value="Discard Changes" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab"
                    aria-controls="basicInfo" aria-selected="true">Thông tin tài khoản</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab"
                    aria-controls="connectedServices" aria-selected="false">Đăng truyện</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="chap-tab" data-toggle="tab" href="#chap" role="tab"
                    aria-controls="connectedServices" aria-selected="false">Đăng chap truyện</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="hitory-tab" data-toggle="tab" href="#history" role="tab"
                    aria-controls="connectedServices" aria-selected="false">lịch sử bài đăng</a>
                </li>
              </ul>
              <div class="tab-content ml-1" id="myTabContent">
                <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                  <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                      <label style="font-weight:bold;">Full Name</label>
                    </div>
                    <div class="col-md-8 col-6">
                      {{Auth::user()->name}}
                    </div>
                  </div>
                  <hr />

                  <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                      <label style="font-weight:bold;">Email</label>
                    </div>
                    <div class="col-md-8 col-6">
                      {{Auth::user()->email}}
                    </div>
                  </div>
                  <hr />


                  <div class="row">
                    <div class="col-sm-3 col-md-2 col-5">
                      <label style="font-weight:bold;">Phone</label>
                    </div>
                    <div class="col-md-8 col-6">
                      {{Auth::user()->phone_number}}
                    </div>
                  </div>


                </div>
                <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                  aria-labelledby="ConnectedServices-tab">
                  <form method="POST" action="{{url('user/save-manga')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="user_id" value="{{ Auth::user()->id }}" style="display:none">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Mã truyện</label>
                        <input type="text" name="Ma_truyen" class="form-control" placeholder="Mã truyện" required>
                      </div>
                      <div class="form-group">
                        <label>Tên truyện</label>
                        <input type="text" name="Ten_truyen" class="form-control" placeholder="Tên truyện" required>
                      </div>
                      <div class="form-group">
                        <label>Thể loại</label>
                        <select name="Ma_the_loai" class="form-control">
                          <?php foreach($theloai as $key => $the_loais){ ?>
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
                          <input type="file" name="Hinh_anh" onchange="chooseFile1(this)" required="required" />
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
                <div class="tab-pane fade" id="chap" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                  <div class="col-md-8 col-sm-8" style="margin:auto">
                    <!-- general form elements -->
                    <div class="card card-primary">
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
                              <?php foreach($manga as $key => $truyens){ ?>
                              <option value="{{$truyens->Ma_truyen}}">{{$truyens->Ten_truyen}}</option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Mã chapter</label>
                            <input type="text" name="Ma_chap" class="form-control" placeholder="Mã chapter"
                              required="required">
                          </div>
                          <div class="form-group">
                            <label>Tên chapter</label>
                            <input type="text" name="Ten_chap" class="form-control" placeholder="Tên chapter"
                              required="required">
                          </div>

                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 1<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_1" onchange="chooseFile(this,'Hinh_anh_1')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_1" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 2<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_2" onchange="chooseFile(this,'Hinh_anh_2')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_2" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 3<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_3" onchange="chooseFile(this,'Hinh_anh_3')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_3" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 4<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_4" onchange="chooseFile(this,'Hinh_anh_4')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_4" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 5<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_5" onchange="chooseFile(this,'Hinh_anh_5')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_5" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 6<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_6" onchange="chooseFile(this,'Hinh_anh_6')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_6" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 7<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_7" onchange="chooseFile(this,'Hinh_anh_7')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_7" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 8<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_8" onchange="chooseFile(this,'Hinh_anh_8')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_8" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 9<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_9" onchange="chooseFile(this,'Hinh_anh_9')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_9" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 10<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_10" onchange="chooseFile(this,'Hinh_anh_10')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_10" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 11<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_11" onchange="chooseFile(this,'Hinh_anh_11')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_11" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 12<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_12" onchange="chooseFile(this,'Hinh_anh_12')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_12" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 13<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_13" onchange="chooseFile(this,'Hinh_anh_13')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_13" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 14<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_14" onchange="chooseFile(this,'Hinh_anh_14')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_14" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 15<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_15" onchange="chooseFile(this,'Hinh_anh_15')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_15" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 16<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_16" onchange="chooseFile(this,'Hinh_anh_16')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_16" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 17<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_17" onchange="chooseFile(this,'Hinh_anh_17')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_17" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 18<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_18" onchange="chooseFile(this,'Hinh_anh_18')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_18" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 19<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_19" onchange="chooseFile(this,'Hinh_anh_19')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_19" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Ảnh 20<span class="required">*</span></label>
                            <br>
                            <input type="file" name="Hinh_anh_20" onchange="chooseFile(this,'Hinh_anh_20')" />
                            <div class="col-md-8 col-sm-10 " style="margin:auto;">
                              <p class="help-block"></p>
                              <img class="image-fasle" id="Hinh_anh_20" style="width: inherit;"
                                onerror="this.src='/admin_images/no-avatar.png'" />
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
                </div>
                <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Truyện</h3>
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
                                <td style="vertical-align: middle;"><span
                                    class="tag tag-success">{{$truyen->user_manga->name}}</span></td>
                                <td style="vertical-align: middle;">{{$truyen->status->name}}</td>

                                <td style="vertical-align: middle;"><img style="width: 120px;"
                                    src="https://lh3.googleusercontent.com/d/{{$truyen->Hinh_anh_truyen}}" alt=""></td>
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
                          <h3 class="card-title">Chapter truyện</h3>
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
                                <td style="vertical-align: middle;">{{$chapters->name}} </td>

                                <!-- <td style="vertical-align: middle;"><a href="" style="margin-right:5px"><i class="fas fa-edit"></i></a><a href="" style="color:red;margin-left:5px"><i class="fas fa-trash-alt"></i></a></td> -->

                              </tr>
                              @endforeach


                            </tbody>
                          </table>
                        </div>
                        <?php }
                        else{?>
                        <div style="margin:auto;font-size:15pt;color:#9BA4B5">Không có bài đăng</div>
                        <?php } ?>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {


    var readURL = function (input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.avatar').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }


    $(".file-upload").on('change', function () {
      readURL(this);
    });
  });
</script>
<script>
  function chooseFile1(fileIn) {
    if (fileIn.files && fileIn.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#image').attr('src', e.target.result);
      }
      reader.readAsDataURL(fileIn.files[0]);
    }
  }
</script>

<style>
  .image-true {
    display: block;
  }

  .image-fasle {
    display: none;
  }
</style>
<script>
  function chooseFile(fileIn, names) {
    console.log(names);
    if (fileIn.files && fileIn.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#' + names).attr('src', e.target.result);
      }
      reader.readAsDataURL(fileIn.files[0]);
      document.getElementById(names).classList.remove("image-fasle");
      addClass('#' + names, 'image-true');
    }
  }
</script>
@endsection