<x-layout>
@include('partials._nav')
@include('partials._search')
    <section id="trending" class="flex w-100 flex-row">
        <div style="width: 70%" class="mainpage flex flex-wrap items-center justify-center">
            @unless (count($eventings) == 0)
            @foreach ($eventings as $eventing)
                <x-event-card :eventing="$eventing" />
            @endforeach
                @else 
                <p class="text-white text-4xl">No event found</p>
            @endunless
        </div>
        <div style="width: 28%" class="mainGerne">
            <div id="st" class="gerList">
                <x-gerne-card :geners="$geners" :artists="$artists" :venues="$venues" />
            </div>
        </div>
    </section>
    <section>
        <div class="mt-6 p-4">
            {{$eventings->links()}}
        </div>
    </section>
</x-layout>