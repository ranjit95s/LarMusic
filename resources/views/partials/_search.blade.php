<section id="search">
    {{-- <nav class="w-100 navbar navbar-light">
        <div class="container-fluid">
            <form action="/" autocomplete="off" class="d-flex mt-2 w-100 p-3">
                <input class="form-control me-3" type="text" name="search" placeholder="Search" aria-label="Search">
                <button class="btn imp btn-outline-success text-white" type="submit">Search</button>
            </form>
        </div>
    </nav> --}}

    
<form action="/" autocomplete="off" class="m-5">
    <style scoped>
        /* since nested groupes are not supported we have to use 
           regular css for the nested dropdowns
        */
        li > ul {
          transform: translatex(100%) scale(0);
        }
        li:hover > ul {
          transform: translatex(101%) scale(1);
        }
        li > button svg {
          transform: rotate(-90deg);
        }
        li:hover > button svg {
          transform: rotate(-270deg);
        }
      </style>
    <div class="flex bg-gray-400 rounded-l-lg rounded-r-lg">
        {{-- <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> --}}
        <div class="relative w-full flex rounded-l-lg">
            <input name="search" type="search" id="search-dropdown" class="block p-2.5 w-3/5 z-20 text-sm text-gray-900 bg-gray-50 rounded-l-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Event, Artist, Venue...">
            <select id="artists" name="typeA" class="bg-gray-50 border w-96 border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="">Choose a Artist</option>
                    @foreach ($artists as $artist)
                    <option value="{{$artist->name}}">{{$artist->name}}</option>
                    @endforeach
                </select>
                <select id="genres" name="typeG" class="bg-gray-50 border w-96 border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value="">Choose a Genre</option>
                    @foreach ($geners as $gener)
                    <option value="{{$gener->name}}">{{$gener->name}}</option>
                    @endforeach
                    </select>
                <div date-rangepicker class="flex items-center w-1/2">
                    <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input style="font-size: 0.875rem" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date start">
                    </div>
                    <span class="mx-1 text-gray-700">to</span>
                    <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input style="font-size: 0.875rem" name="end" type="text" class="bg-gray-50 border rounded-l-lg border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Date end">
                </div>
                </div>
            <button style="padding-bottom: 13px" type="submit" class="absolute top-0 -right-1 p-2.5 text-sm font-medium text-white bg-[color:var(--primary-text-color)] rounded-r-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-[color:var(--primary-text-color)]-600 dark:hover:bg-[color:var(--primary-text-color)]-700 dark:focus:ring-[color:var(--primary-text-color)]-800">
                <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</form>
</section>