@extends('layout')

@section('content')
<!-- <div class="alert-secondary p-3">
        <form action="{{ url('tim-kiem-truyen') }}" method="POST" class="form-inline  ">@csrf
            <input class="form-control mr-2 w-50" name="tktk" type="search" placeholder="Tìm kiếm" required>
            <button class="btn btn-success " type="submit">Tìm kiếm</button>
        </form>
    </div> -->
    <!-- <div class="p-2">
        <a href="{{ url('/') }}" class="btn mb-1 @if (!isset($xn)) btn-secondary @else btn-outline-secondary @endif ">Tất cả</a>

        
    </div> -->
    <div class="row" style="margin-top:10px">
        @if ($truyen->count() > 0)
            @foreach ($truyen as $truyens)
                <div class="col-md-4 col-sm-6 col-6 col-lg-3" >
                    <div class="card mb-3 ">
                        <a href="{{URL::to('/detail-manga/'.$truyens->Ma_truyen)}}"><div class="card-body" style="padding: 0px">
                            <div style="">
                                <img style="object-fit: fill;width:100%;height:350px " src="https://lh3.googleusercontent.com/d/{{$truyens->Hinh_anh_truyen}}" alt="ảnh">
                            </div>
                        </div></a>
                        <div class="card-footer text-center">

                            <a href="{{URL::to('/detail-manga/'.$truyens->Ma_truyen)}}" class="font-weight-bold  text-dark">{{$truyens->Ten_truyen}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="jumbotron bg-light display-4 w-100 text-center">Không có truyện :</div>
        @endif
        
        
    </div>
    

    
@endsection