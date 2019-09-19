@if ($errors->any())

<div class="p-3 mb-2 bg-danger text-white">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif 