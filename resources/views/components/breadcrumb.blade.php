<ul class="my-1 text-xs inline-flex font-extralight text-gray-500 {{ $class ?? '' }}">
    <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
    @foreach($crumbs ?? [] as $value)
        <li>
            <span class="ml-1">\</span>
            @if(is_array($value))
                <a href="{{ $value[0] }}" class="hover:underline">{{ $value[1] }}</a>
            @else
                <span class="text-gray-900">{{ $value }}</span>
            @endif
        </li>
    @endforeach
</ul>