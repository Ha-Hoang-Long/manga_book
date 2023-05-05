@extends('layout')
@section('content')
    
    <ul class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('detail-manga/' . $truyen[0]->Ma_truyen) }}">{{ $truyen[0]->Ten_truyen }}</a>
        </li>
        <li class="breadcrumb-item active">
            {{ $chap[0]->Ten_chap }}
        </li>
    </ul>
<div class="alert-success p-2">
    <img  style="width:150px" src="https://lh3.googleusercontent.com/d/{{$truyen[0]->Hinh_anh_truyen}}" alt="ảnh">
    <h5>{{ $truyen[0]->Ten_truyen }}</h5>
    <hr>
    <h5>{{ $chap[0]->Ten_chap }}</h5>
    <p>Cập nhật ngày {{ $chap[0]->created_at }}</p>

</div>
    <div>
        <style>
            img {width: 100%}
        </style>
        <p class="help-block"></p>
        <?php   $i = 1;
                $hinh = 'Hinh_anh_';
                $hinh_anh = 'Hinh_anh_';
        for($i = 1; $i <= 20; $i++){
            $hinh_anh = $hinh."$i";
            if($chap[0]->$hinh_anh != null){
            
        ?>
        
        <div class="col-md-8 col-sm-10 " style="margin:auto;">
            <!-- <p class="help-block"></p> -->
            <img style="width: inherit;" src="https://lh3.googleusercontent.com/d/{{$chap[0]->$hinh_anh}}" alt="">
        </div>
        <?php } 
        }
        ?>
        
        
    </div>
    <div style="margin:15px;text-align: -webkit-center;">
    <?php $dem1 = 0;$dem2 = 0;$a=0;$b=0;$temp=0;
    foreach ($list_chap as $l){
        
        if($l->Ma_chap == $chap[0]->Ma_chap){
            $dem2+=2;
            break;
        }
        $dem1+=1;
        $dem2+=1;
    }?>
    <?php 
    foreach ( $list_chap as $truoc ){
        if($dem1 == 0){
            break;
        }else{
            $a+=1;
            if($dem1 == $a){
                $a = $truoc->Ma_chap;?>
                <button type="button" class="btn btn-info" onClick="location.href='{{ url('doc-truyen/' .  $truyen[0]->Ma_truyen . '/' .$a )}}'">Chap trước</button><span>&nbsp&nbsp&nbsp</span>
                <?php
                break;
            }
        }
    }
    ?>
    <?php 
    foreach ( $list_chap as $dem ){
        $temp+=1;
    }
    foreach ( $list_chap as $sau ){
        
        $b+=1;
        if($dem2 == $b){
            $b = $sau->Ma_chap;?>
            <button type="button" class="btn btn-info" onClick="location.href='{{ url('doc-truyen/' .  $truyen[0]->Ma_truyen . '/' .$b )}}'">Chap sau</button>
            <?php
            break;
        }
    }    
    ?>
      
    </div>
    <div class="card my-2">
        <div class="card-header">
            Danh sách chương
        </div>
        
        <div style="max-height: 300px;overflow:auto">
            
                @foreach ($list_chap as $list)
                    <div class="px-3 d-flex justify-content-between" style="border-bottom:1px solid rgb(218, 218, 218)">
                        @if ($list->Ma_chap==$chap[0]->Ma_chap)
                            <span class="text-primary">{{ $list->Ten_chap }} <small class="text-success">(Hiện tại)</small> </span>
                        @else
                            <a href="{{ url('doc-truyen/' . $truyen[0]->Ma_truyen . '/' . $list->Ma_chap) }}">{{ $list->Ten_chap }}</a>
                        @endif
                        
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
        <div class="card-header">Bạn hãy <a href="{{ route('login') }}">đăng nhập</a>  để bình luận</div>

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
