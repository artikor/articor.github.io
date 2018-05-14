@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="p-link disabled">&lsaquo;&lsaquo;</span>
        @else
            <a class="p-link" href="{{$paginator->previousPageUrl() }}" rel="prev">&lsaquo;&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="p-link disabled">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="p-link active">{{ $page }}</span>
                    @else
                        <a class="p-link" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="p-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&rsaquo;&rsaquo;</a>
        @else
            <span class="p-link disabled">&rsaquo;&rsaquo;</span>
        @endif
    </div>
@endif

