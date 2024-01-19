@if(session()->has('message') && session()->has('status'))
    <div class="alert alert-{{session('status')}}">
        {{session('message')}}
    </div>
@endif
