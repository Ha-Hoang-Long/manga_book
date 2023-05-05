@foreach ($comment as $i)
    <div class="py-2 px-3 my-1 rounded alert-secondary d-flex justify-content-between">
        
        <div>
            <b>{{ $i->user->name }}</b>
            <small>({{ $i->created_at }}): </small><br>
            <span class="text-info">{{ $i->Noi_dung }} </span>
        </div>
        <div>
            
        </div>
    </div>
@endforeach