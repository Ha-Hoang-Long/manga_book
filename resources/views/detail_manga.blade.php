@extends('layout')

@section('content')
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $truyen[0]->Ten_truyen }}
        </li>
    </ul>
    @if (session('success'))
        <div class="alert alert-warning">
            {{ session('success') }}<button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card alert-success">
                <div class="card-body" style="text-align:center">
                    <div>
                        <img style="object-fit: cover; height:350px" src="https://lh3.googleusercontent.com/d/{{ $truyen[0]->Hinh_anh_truyen }}" alt="ảnh">
                    </div>
                </div>
                <div class="card-footer">
                    <h4>{{ $truyen[0]->Ten_truyen }}</h4>
                    @if ($truyen[0]->user_id != null)
                    <p>Tác giả: {{ $truyen[0]->user_manga->name }}</p>
                    @else
                    <p>Tác giả: Đang cập nhật</p>
                    @endif
                    <p>Ngày cập nhật: {{ $truyen[0]->created_at }}</p>
                    <!-- <p>Trạng thái: <span class="badge badge-success"></span></p> -->
                    
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="card ">
                <div class="card-body alert-success">
                    <h5>Mô tả nội dung chính</h5>
                </div>
                <div class="card-footer">
                    <p>{{ $truyen[0]->Noi_dung }}</p>
                </div>
            </div>
        </div>
    </div>
    

    <div class="card my-2">
        <div class="card-header">
            Danh sách chương
        </div>
        <div style="max-height: 300px;overflow:auto">

            @foreach ($chap as $c)
                <div class="px-3 d-flex justify-content-between" style="border-bottom:1px solid rgb(218, 218, 218)">
                    <a href="{{ url('doc-truyen/' .  $truyen[0]->Ma_truyen . '/' . $c->Ma_chap) }}">{{ $c->Ten_chap }}</a>
                    
                    </p>
                </div>
            @endforeach

        </div>
    </div>

    <div class="card my-2 alert-secondary">
        <div class="card-header">
            Bình luận truyện
        </div>
        @if (Auth::user())
        <div class="card-body">
            <form action="{{url('comment')}}" method="post">
                @csrf
                <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" style="display:none">
                <input type="text" id="Ma_truyen" name="Ma_truyen" value="{{ $truyen[0]->Ma_truyen }}" style="display:none">
                <textarea type="text" placeholder="Nội dung" rows="2" id="noi_dung_comment" name="Noi_dung" class="form-control mb-1" style="resize: none;"></textarea>
                <small id="comment-error" class="help-blog"></small><br>
                <button type="submit" class="btn btn-success" id="btn-comment">Gửi</button>
            </form>

        </div>
        @else
        <div class="card-header">Bạn hãy <a href="{{ URL::to('/logins') }}">đăng nhập</a>  để bình luận</div>

        @endif
        
        
    </div>
    <div id="comment">
    @foreach ($comment as $i)
        <div class="py-2 px-3 my-1 rounded alert-secondary d-flex justify-content-between">
            
            <div>
                <b>{{ $i->Name }}</b>
                <small>({{ $i->created_at }}): </small><br>
                <span class="text-info">{{ $i->Noi_dung }} </span>
            </div>
            <div>
                
            </div>
        </div>
    @endforeach
    </div>
        
    
<script>
    $('#btn-comment').click(function(ev){
        ev.preventDefault();
        let content = $('#noi_dung_comment').val();
        let Ma_truyen = $('#Ma_truyen').val();
        let user_id = $('#user_id').val();
        let _commentUrl = '{{route("user.comment")}}';
        console.log(content,Ma_truyen,user_id);
        $.ajax({
            url: _commentUrl,
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                Ma_truyen: Ma_truyen,
                user_id: user_id,
                Noi_dung: content,

            },
            success: function(res){
                if(!res.error){
                    console.log('ok');
                    $('#noi_dung_comment').val('');
                    $('#comment-error').html('');
                    $('#comment').html(res);
                    
                } else {
                    $('#comment-error').html(res.error)
                    console.log(res);
                }
            }
        })
    })
</script>
@endsection
