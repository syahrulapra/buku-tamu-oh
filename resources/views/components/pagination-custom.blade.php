<nav aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px">  
    @if ($paginator->onFirstPage())
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 cursor-not-allowed">Previous</a>
        </li>
    @else
        <li>
            <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">Previous</a>
        </li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <li>
                <a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white cursor-not-allowed">{{ $element }}</a>
            </li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                <li>
                    <a class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 cursor-not-allowed">{{ $page }}</a>
                </li>
                @else
                <li>
                    <a href="{{ $url }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 cursor-pointer">{{ $page }}</a>
                </li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
    <li>
        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">Next</a>
    </li>
    @else
    <li>
        <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 cursor-not-allowed">Next</a>
    </li>
    @endif
    </ul>
</nav>