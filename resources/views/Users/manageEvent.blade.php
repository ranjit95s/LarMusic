<x-layout>
    @include('partials._nav')
    {{-- g --}}
<section class="mainMan flex flex-col w-full justify-center items-center">
    <section class="genreAdd w-11/12 m-2 p-2" style="color: #212529">
        <div class="flex flex-row rounded dark:bg-gray-800 relative -bottom-3 p-4 dark:border-gray-700 justify-evenly items-center">
            <div class="g_add">
                <x-gerne_add />
            </div>
            <div class="a_add">
                <x-artist_add />
            </div>
            <div class="v_add">
                <x-venue_add />
            </div>
        </div>
    <x-gerne-card :geners="$geners" :artists="$artists" :venues="$venues" />
    </section>

    <section class="w-11/12 m-2 p-2" style="color: #212529">
<div class="overflow-x-auto dark:bg-gray-800 relative shadow-md sm:rounded-lg">
    <style scoped>
        body
        {
            counter-reset: Serial;           /* Set the Serial counter to 0 */
        }

        table
        {
            border-collapse: collapse;
        }

        .auto-index td:first-child:before
{
    text-align: center;
  counter-increment: Serial;      /* Increment the Serial counter */
  content: counter(Serial); /* Display the counter */
}
   
      </style>
    <div class="flex m-4 justify-between items-center py-4 dark:bg-gray-800">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Manage Events</span>
                Manage Events
                <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>
        
    </div>
    <table class="auto-index w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            @unless ($eventings->isEmpty())
            <tr>
                <th scope="col" class="py-3 px-6">
                    Sr. No.
                </th>
                <th scope="col" class="py-3 px-6">
                    Artist Name + Genre
                </th>
                <th scope="col" class="py-3 px-6">
                    Description
                </th>
                <th scope="col" class="py-3 px-6">
                    Amount
                </th>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Venue
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
                
                @foreach ($eventings as $eventing)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="p-4 w-4 text-center">
                </td>
                <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="{{asset('storage/' . $eventing->image)}}" alt="event image">
                    <div class="pl-3">
                        <a href="/events/{{$eventing->id}}" class="dark:hover:text-blue-400"><div class="text-base font-semibold">{{$eventing->artist_Name}} <a href="/events/{{$eventing->id}}/edit"> <span class="text-blue-500 ml-2">&#128393;</span></a> </div></a>
                        <div class="font-normal mt-2 text-gray-500"> <x-event-tags :tagsCsv="$eventing->gerne" /></div>
                    </div>  
                </th>
                <td class="py-4 px-6">
                    {{$eventing->shortDesc}}
                </td>
                <td class="py-4 px-6">
                    <div class="flex items-center">
                         <span>&#8377;</span> {{$eventing->amount}}
                    </div>
                </td>
                <td class="py-4 px-6">
                    <div class="flex items-center">
                        {{$eventing->date}}
                    </div>
                </td>
                <td class="py-4 px-6">
                    <div class="flex items-center">
                        @php
                        $sentence = $eventing->venue;
                        $first = explode(',', trim($sentence ))[0];
                        @endphp
                        {{$first}}
                    </div>
                </td>
                <td class="py-4 px-6">
                    <form action="/events/{{$eventing->id}}" method="post">
                        @csrf
                        @method('DELETE')
                                <button class="font-medium text-red-600 dark:red-blue-500 hover:underline" type="submit">
                                    Delete Event
                                </button>
                            </form>
                </td>
            </tr>
            @endforeach
                    @else

                        <div class="w-full text-center text-white mb-4 mt-1">
                            No event Found!
                        </div>
                    @endunless
        </tbody>
    </table>
</div>


    </section>

</section>
    
    
</x-layout>