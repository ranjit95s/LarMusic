<x-layout>
@include('partials._nav')
@include('partials._search')
    <section id="event">
        {{-- <div class="container mainEvent w-100 d-flex">
            <div class="first w-50">
                <div class="imageTag">
                    <img src="{{asset('storage/' . $sevent->image)}}" alt="" srcset="">
                </div>
            </div>
            <div class="second w-50">
                <div class="title">
                    <div class="col">
                        <h2>{{$sevent->artist_Name}} <span>Live</span></h2>
                        <div class="gerne m-0 p-0">
                            <x-event-tags :tagsCsv="$sevent->gerne" />
                        </div>
                    </div>
                    <div class="date">
                        <h3>24<br><span>July</span></h3>
                        <input id="datedata" type="text" hidden name="date" value="{{$sevent->date}}">
                    </div>
                </div>
                <div class="dec">
                    <p>{{$sevent->shortDesc}}</p>
                </div>
                <div class="sectwo d-flex justify-content-between w-100">
                    <div class="venue">
                        <h6 class="text-muted">At</h6>
                        <h2>{{$sevent->venue}}</h2>
                    </div>
                    <div class="amount">
                        <h6 class="text-muted">Amount</h6>
                        <h2>$ {{$sevent->amount}}</h2>
                    </div>
                </div>
                <div class="text-muted">
                    Time remain
                </div>
                <div class="inone">
                    <div class="w">
                        <div class="n" id="days">
                        </div>
                    </div>
                    <div class="w">
                        <div class="n" id="hours">
                        </div>
                    </div>
                    <div class="w">
                        <div class="n" id="minutes">
                        </div>
                    </div>
                    <div class="w">
                        <div class="n" id="seconds">
                        </div>
                    </div>
                </div>
                @auth
                <div class="admin mt-3 py-3 d-flex">
                    <button type="button" class="btn btn-warning"><a href="/events/{{$sevent->id}}/edit">Edit</a></button>
                    <form action="/events/{{$sevent->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn mx-3 btn-danger">Delete</button>
                    </form>
                </div>
                @endauth
                
            </div>
            
        </div> --}}
        
 <!-- Container -->
<div class="container mx-auto mt-10 p-4 md:p-0">
  
    <!-- Card wrapper -->
    <div class="shadow-lg shadow-orange-500/40 flex flex-wrap w-full lg:w-4/5 mx-auto">
      
      <!-- Card image -->
      <div class="bg-cover rounded-l-lg bg-bottom w-full md:w-1/3 h-64 md:h-auto relative" style="background-image: url({{asset('storage/' . $sevent->image)}});">
      </div>
      <!-- ./Card image -->
      
      <!-- Card body -->
      <div class="bg-[color:var(--primary-bg-c)] w-full  md:w-2/3">
        <!-- Card body - outer wrapper -->
        <div class="flex shadow-lg items-center relative right-3 justify-start">
            <div class="w-full">
                <!-- 1 card -->
                <div class="relative bg-white py-6 px-6 rounded-3xl my-4 w-full">
                    <div class=" text-white flex text-center items-center absolute rounded-full py-4 px-4 shadow-xl bg-orange-600 right-4 -top-6">
                        <h2>{{$sevent->date}}</h2>
                        <input id="datedata" type="text" hidden name="date" value="{{$sevent->date}}">
                    </div>
                    <div class="mt-8">
                        <p class="text-xl font-semibold my-2">{{$sevent->artist_Name}} <span>Live</span></p>
                        <p class="text-x font-semibold my-1 text-gray-500">{{$sevent->shortDesc}}</p>
                        <div class="smallwrap flex flex-row items-center justify-between">
                            <div class="flex space-x-2 text-gray-400 text-lg">
                                <!-- svg  -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                 <p>
                                        {{$sevent->venue}}
                                </p> 
                            </div>
                            <div class="flex space-x-2 text-gray-400 my-3 text-lg">
                                <!-- svg  -->
                                <?xml version="1.0" encoding="iso-8859-1"?>
                                <!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                <!-- License: CC0. Made by SVG Repo: https://www.svgrepo.com/svg/71728/india-rupee-currency-symbol -->
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                class="h-6 w-7" fill="none" viewBox="0 0 78.879 78.879" stroke="currentColor" style="enable-background:new 0 0 76.879 76.879;"
                                     xml:space="preserve">
                                <g>
                                    <g>
                                        <g>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M54.204,76.879c-1.554,0-3.027-0.593-4.147-1.671c-2.427-2.335-3.818-6.069-4.56-8.791
                                                c-0.843-2.499-1.953-6.821-3.47-13.519c-1.774-8.248-4.521-10.975-11.307-11.231l-6.827,0.001c-0.055,0-0.113-0.004-0.173-0.012
                                                h-4.238c-2.873,0-5.21-2.336-5.21-5.209c0-2.873,2.337-5.21,5.21-5.21H31.48c5.092,0,9.017-1.695,11.121-4.723H16.199
                                                c-2.925,0-5.304-2.38-5.304-5.305s2.379-5.305,5.304-5.305h27.124c-1.969-4.014-6.554-5.237-10.311-5.519H16.199
                                                c-2.974,0-5.304-2.271-5.304-5.17c0-2.924,2.33-5.215,5.304-5.215h44.48c2.974,0,5.304,2.291,5.304,5.215
                                                c0,2.899-2.33,5.17-5.304,5.17h-6.062c0.861,1.666,1.481,3.528,1.834,5.519h4.228c2.925,0,5.304,2.38,5.304,5.305
                                                s-2.379,5.305-5.304,5.305h-5.013c-1.563,4.418-4.67,7.992-8.951,10.329c3.514,2.528,5.916,6.756,7.304,12.83
                                                c1.919,8.202,3.612,15.19,4.886,17.556c0.001,0.002,0.002,0.004,0.003,0.006c1.831,2.343,1.681,5.656-0.392,7.811
                                                C57.378,76.229,55.847,76.879,54.204,76.879z M30.777,38.668c8.29,0.314,12.118,3.996,14.179,13.585
                                                c1.49,6.579,2.574,10.808,3.41,13.292c0.932,3.417,2.262,6.051,3.77,7.501c1.15,1.106,3.115,1.067,4.22-0.081
                                                c1.06-1.102,1.104-2.816,0.103-3.988c-0.117-0.14-0.209-0.297-0.271-0.47c0-0.002-0.001-0.005-0.002-0.007
                                                c-1.429-2.768-3.015-9.287-5.088-18.15c-1.491-6.519-4.189-10.527-8.251-12.262c-0.562-0.24-0.922-0.796-0.91-1.407
                                                c0.011-0.611,0.393-1.154,0.962-1.373c5.185-1.989,8.817-5.792,10.233-10.708c0.186-0.643,0.773-1.085,1.441-1.085h6.107
                                                c1.271,0,2.304-1.034,2.304-2.305s-1.034-2.305-2.304-2.305h-5.524c-0.763,0-1.403-0.572-1.489-1.33
                                                c-0.34-2.966-1.389-5.729-2.953-7.779c-0.346-0.453-0.404-1.064-0.151-1.575c0.253-0.511,0.774-0.835,1.344-0.835h8.774
                                                c1.312,0,2.304-0.933,2.304-2.17c0-1.242-1.012-2.215-2.304-2.215H16.199c-1.292,0-2.304,0.973-2.304,2.215
                                                c0,1.237,0.991,2.17,2.304,2.17h16.868c0.036,0,0.073,0.001,0.109,0.004c7.474,0.544,12.349,3.975,13.726,9.662
                                                c0.108,0.447,0.005,0.919-0.278,1.28c-0.285,0.362-0.72,0.573-1.18,0.573H16.199c-1.271,0-2.304,1.034-2.304,2.305
                                                s1.034,2.305,2.304,2.305h28.866c0.492,0,0.953,0.241,1.232,0.646c0.281,0.404,0.345,0.92,0.172,1.38
                                                c-2.039,5.446-7.642,8.697-14.989,8.697H19.482c-1.219,0-2.21,0.992-2.21,2.21c0,1.218,0.992,2.21,2.21,2.21h4.359
                                                c0.054,0,0.108,0.003,0.162,0.009c0.006,0,0.012,0.001,0.017,0.002L30.777,38.668z"/>
                                        </g>
                                    </g>
                                </g>
                                </svg>
                                 <p>{{$sevent->amount}}</p> 
                            </div>
                            <div class="flex space-x-2 text-gray-400 text-lg my-3">
                                <!-- svg  -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                 <p> <span id="diffDate"></span></p> 
                            </div>
                        </div>
                        <div class="border-t-2"></div>
                        <div class="genreshow mt-2">
                            <x-event-tags :tagsCsv="$sevent->gerne" />
                        </div>
                        <div class="border-t-2 mt-2"></div>
                        <div class="adminbtn mt-2 flex flex-row ">
                            @auth
                                <a href="/events/{{$sevent->id}}/edit"><button type="button" class="text-yellow-400 bg-black hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Edit</button></a>
                                <form action="/events/{{$sevent->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700 hover:text-white border bg-black border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">Delete</button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
        
   
            </div>
        </div>
      </div>
      <!-- ./Card body -->
    </div>
    <!-- ./Card wrapper -->
  </div>
  <!-- ./Container -->

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.2.1/moment.min.js"></script>
    </div>
   <script>let today = new Date().toISOString().slice(0, 10)
    // console.log(today);
    const todays    = today;
    const EventDate  = document.getElementById("datedata").value;
    const diffInMs   = new Date(EventDate) - new Date(todays)
    const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
    const diffDate = document.getElementById("diffDate");
    if(diffInDays < 0){
        diffDate.innerHTML="Expire Event"
    }else{
        diffDate.innerHTML=diffInDays + "Days Left";
    }
    
    </script>
</x-layout>