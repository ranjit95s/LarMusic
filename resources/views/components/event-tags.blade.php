@props(['tagsCsv'])

@php
$tags = explode(',', $tagsCsv);
@endphp

<ul class="list-group m-0">
    @foreach ($tags as $tag)
    <span class="bg-blue-100 m-0 text-[color:var(--primary-text-color)]-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-[color:var(--primary-text-color)]"><a class="me-2" href="/?tag={{$tag}}">{{$tag}}</a></span>
    @endforeach
</ul>
