@props(['eventing'])

@php
$sentence = $eventing->venue;
$first = explode(',', trim($sentence ))[0];
@endphp
<div class="imageContainer drop-shadow-lg rounded-lg m-2 h-96 relative" style="background-image: url({{asset('storage/' . $eventing->image)}}); width:48%; object-fit: cover; background-repeat: round;">
    <style scoped>
        .imageContainer:before,
.imageContainer:after {
    content: '';
    position: absolute;
    /* left:5%; */
    opacity: 0.5;
}

.imageContainer:before {
    top: 0;
    border-radius: 14px;
    width: 100%;
    height: 100%;
    /* -moz-box-shadow: inset 0px 850px 500px -500px #000; */
    /* -webkit-box-shadow: inset 0px 850px 500px -500px #000; */
    /* -o-box-shadow: inset 0px 850px 500px -500px #000; */
    box-shadow: inset 0px 1050px 850px -100px rgb(0, 0, 0);
}

.imageContainer:after {
    width: 100%;
    height: 49%;
    border-radius: 13px;
    top: 51%;
    background: rgb(0, 0, 0);
    overflow: hidden;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}
    </style>
    <button data-tooltip-target="tooltip-light-{{$eventing->id}}" data-tooltip-style="light" type="button" class="inline-flex absolute top-2 right-2 items-center p-2 text-sm font-medium text-center bg-white rounded-lg  focus:ring-4 focus:outline-none ">
        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm0 11h6v1h-7v-9h1v8z"/></svg>
        <span class="sr-only">Date</span>
      </button>
      <div id="tooltip-light-{{$eventing->id}}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 tooltip">
        {{$eventing->date}}
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>
    <div class="w-full z-20 absolute bottom-2 rounded-lg shadow-md dark:border-gray-700">
    <div class="px-5 pb-3">
        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$eventing->artist_Name}} Live at

            {{$first}} </h5>        
        <div class="flex flex-wrap items-center mt-1 mb-2">
            <span class="me-1">@include('partials._gerne-name')</span>
            <x-event-tags :tagsCsv="$eventing->gerne" />
        </div>
        <h3 class="text-sm mb-1 font-semibold tracking-tight text-gray-400">{{$eventing->shortDesc}}</h3>
        <div class="flex mt-1 items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{$eventing->amount}}</span>
            <a href="/events/{{$eventing->id}}" class="text-white flex flex-row items-center bg-[color:var(--primary-text-color)] hover:bg-white-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[color:var(--primary-text-color)] dark:hover:bg-orange-700 dark:focus:ring-orange-800"> Read more
                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></a>
        </div>
    </div>
</div>
</div>