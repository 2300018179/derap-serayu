@once
    <style>
        .ds-search {
            display: flex;
            flex: 0 0 230px;
            align-items: center;
            gap: 9px;
            width: 230px;
            height: 40px;
            margin: 0;
            padding: 0 12px;
            border-radius: 22px;
            background: #f0f7fa;
            color: #8ba2af;
        }

        .ds-search input {
            width: 100%;
            min-width: 0;
            padding: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: #073f5e;
            font-family: inherit;
            font-size: 10px;
        }

        .ds-search input::placeholder {
            color: #9bb0bb;
        }

        .ds-search button {
            display: inline-flex;
            padding: 0;
            border: 0;
            background: transparent;
            color: #7895a4;
            font-size: 13px;
            cursor: pointer;
        }

        .ds-search button:hover,
        .ds-search:focus-within {
            color: #08add5;
        }

        .ds-search:focus-within {
            box-shadow: 0 0 0 2px rgba(8, 173, 213, .25);
        }

        @media (max-width: 760px) {
            .ds-search {
                flex-basis: 100%;
                width: 100%;
            }
        }
    </style>
@endonce

<form class="ds-search" action="{{ $action ?? route('articles.index') }}" method="GET" role="search" aria-label="Cari artikel">
    <button type="submit" aria-label="Cari"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
    <input type="search" name="q" value="{{ request('q') }}" placeholder="Cari berita, topik, atau kata kunci..." aria-label="Cari berita, topik, atau kata kunci" maxlength="100">
</form>
@include('partials.search-script')