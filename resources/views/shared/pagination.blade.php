<nav role="pagination" style="justify-content: center;">
    <ul>
        @isset ($elements)
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span>&hellip;</span>
                    </li>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <strong>{{ $page }}</strong>
                                </span>
                            @else
                                <a href="{{ $url }}" aria-label="Goto page {{ $page }}">{{ $page }}</a>
                            @endif
                        </li>
                    @endforeach
                @endif
            @endforeach
        @else
            <li>
                @if ($paginator->onFirstPage())
                    <span disabled>
                        <i class="fas fa-arrow-circle-left"></i>
                        <span>Previous</span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="fas fa-arrow-circle-left"></i>
                        <span>Previous</span>
                    </a>
                @endif
            </li>
            <li>
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <span>Next</span>
                        <i class="fas fa-arrow-circle-right"></i>
                    </a>
                @else
                    <span disabled>
                        <span>Next</span>
                        <i class="fas fa-arrow-circle-right"></i>
                    </span>
                @endif
            </li>
        @endisset
    </ul>
</nav>