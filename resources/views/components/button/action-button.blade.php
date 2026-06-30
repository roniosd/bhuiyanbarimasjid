@props(['edit' => '', 'id' => '', 'delete' => '', 'show' => '', 'copy' => ''])
@php
    $class = 'transition cursor-pointer px-2 py-1 rounded-full shadow border';
@endphp
<div class="">
    <div class="flex justify-start gap-5">

        @if ($edit)
            <a title="Edit" href="{{ route($edit, $id) }}"
                class="text-green-600 hover:text-green-800 {{ $class }}">
                <i class="bi bi-pencil-square text-lg"></i>
            </a>
        @endif

        @if ($copy)
            <button onclick="copyUrl('{{ $copy }}')"
                class="text-blue-600 hover:text-blue-800 {{ $class }}">
                <i class="bi bi-clipboard text-lg"></i>
            </button>
        @endif

        @if ($show)
            <a title="View" href="{{ route($show, $id) }}"
                class="text-blue-600 hover:text-blue-800 {{ $class }}">
                <i class="bi bi-eye text-lg"></i>
            </a>
        @endif

        @if ($delete)
            <form title="Delete" action="{{ route($delete, $id) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this record?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-800 {{ $class }}">
                    <i class="bi bi-trash3 text-lg"></i>
                </button>
            </form>
        @endif

    </div>
</div>
<script>
    function copyUrl(url) {
        navigator.clipboard.writeText(url);
        alert("Copied!")
    }
</script>
