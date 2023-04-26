@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>


                        <form method="POST" action="{{url('comment')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="text" id="user_id" name="user_id" value="{{ Auth::user()->id }}" style="display:none">
                                    <input type="text" id="Ma_truyen" name="Ma_truyen" value="tavt" style="display:none">
                                    <textarea class="form-control" id="noi_dung_comment" name="Noi_dung" rows="3" placeholder="Enter ..."></textarea>
                                    <small id="comment-error" class="help-blog"></small>
                                </div>
                                
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary" id="btn-comment">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    
                } else {
                    $('#comment-error').html(res.error)
                }
            }
        })
    })
</script>
@endsection