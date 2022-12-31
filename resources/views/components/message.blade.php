@if(session()->has('message'))
    <div class="fixed top-0 transform bg-laravel text-white px-48 py-3 left-1/4">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif
