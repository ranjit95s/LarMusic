@props(['geners','artists','venues'])
<div class="w-full bg-white border rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
    <ul class="flex flex-wrap justify-evenly text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
        <li class="mr-2">
            <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true" class="inline-block p-4 text-blue-600 rounded-tl-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Genre</button>
        </li>
        <li class="mr-2">
            <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Artist</button>
        </li>
        <li class="mr-2">
            <button id="statistics-tab" data-tabs-target="#statistics" type="button" role="tab" aria-controls="statistics" aria-selected="false" class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Venue</button>
        </li>
    </ul>
    <div id="defaultTabContent">
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
    @unless (count($geners) == 0)
    @foreach ($geners as $gener)
    <li class="mr-2">
        @auth
        
<!-- Modal toggle -->
<li class="mr-2">
    <button class="inline-block p-2 rounded hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-orange-500 type="button" data-modal-toggle="authentication-modal-{{$gener->id}}">
        {{$gener->name}}
      </button>
      
</li>
  
  <!-- Main modal -->
  <div id="authentication-modal-{{$gener->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal-{{$gener->id}}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Genre</h3>
                  <form class="space-y-6" method="POST" action="/adminEdit/g">
                    @csrf
                    @method('PUT')
                      <div>
                          <label for="name" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Edit Genre</label>
                          <input type="text" value="{{$gener->name}}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Genre" required>
                          <input type="number" value="{{$gener->id}}" hidden name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Genre" required>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Genre</button>
                    </form>
                  <form class="space-y-6" action="/adminDelete/g" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="number" value="{{$gener->id}}" hidden name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Genre" required>
                    <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete Genre</button>
                </form>
              </div>
          </div>
      </div>
  </div> 
  
        @else
        <a href="/?tag={{$gener->name}}" class="inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">{{$gener->name}}</a>
        @endauth
    </li>
    @endforeach
                @else 
                <p>No genres found</p>
            @endunless
</ul>

        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="services" role="tabpanel" aria-labelledby="services-tab">
            <!-- List -->
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                @unless (count($artists) == 0)
                @foreach ($artists as $artist)
                <li class="mr-2">
                    @auth
        
                    <!-- Modal toggle -->
                    <li class="mr-2">
                        <button class="inline-block p-2 rounded hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-orange-500 type="button" data-modal-toggle="artist-modal-{{$artist->id}}">
                            {{$artist->name}}
                          </button>
                          
                    </li>
                      
                      <!-- Main modal -->
                      <div id="artist-modal-{{$artist->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                          <div class="relative w-full h-full max-w-md md:h-auto">
                              <!-- Modal content -->
                              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="artist-modal-{{$artist->id}}">
                                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                      <span class="sr-only">Close modal</span>
                                  </button>
                                  <div class="px-6 py-6 lg:px-8">
                                      <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Artist</h3>
                                      <form class="space-y-6" method="POST" action="/adminEdit/a">
                                        @csrf
                                        @method('PUT')
                                          <div>
                                              <label for="name" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Edit Genre</label>
                                              <input type="text" value="{{$artist->name}}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Artist" required>
                                              <input type="number" value="{{$artist->id}}" hidden name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Genre" required>
                                            </div>
                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Genre</button>
                                        </form>
                                      <form class="space-y-6" action="/adminDelete/a" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="number" value="{{$artist->id}}" hidden name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Genre" required>
                                        <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete Artist</button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div> 
                      
                            @else
                            <a href="/?artist={{$artist->name}}" class="inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">{{$artist->name}}</a>
                            @endauth
                </li>
                @endforeach
                            @else 
                            <p>No artists found</p>
                        @endunless
            </ul>
        </div>
        <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="statistics" role="tabpanel" aria-labelledby="statistics-tab">
            <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                @unless (count($venues) == 0)
                @foreach ($venues as $venue)
                <li class="mr-2">
                    @auth
        
                    <!-- Modal toggle -->
                    <li class="mr-2">
                        <button class="inline-block p-2 rounded hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-orange-500 type="button" data-modal-toggle="venue-modal-{{$venue->id}}">
                            {{$venue->name}}
                          </button>
                          
                    </li>
                      
                      <!-- Main modal -->
                      <div id="venue-modal-{{$venue->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                          <div class="relative w-full h-full max-w-md md:h-auto">
                              <!-- Modal content -->
                              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="venue-modal-{{$venue->id}}">
                                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                      <span class="sr-only">Close modal</span>
                                  </button>
                                  <div class="px-6 py-6 lg:px-8">
                                      <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Edit Venue</h3>
                                      <form class="space-y-6" method="POST" action="/adminEdit/v">
                                        @csrf
                                        @method('PUT')
                                          <div>
                                              <label for="name" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Edit Venue</label>
                                              <input type="text" value="{{$venue->name}}" name="name" id="name" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Venue" required>
                                              <label for="address" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Edit address Venue</label>
                                              <input type="text" value="{{$venue->address}}" name="address" id="address" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New address for Venue" required>
                                              <label for="contact" class="block mb-2 mt-2 text-sm font-medium text-gray-900 dark:text-white">Edit contact Venue</label>
                                              <input type="number" value="{{$venue->contact}}" name="contact" id="contact" class="bg-gray-50 mt-2 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New contact for Venue" required>
                                              <input type="number" value="{{$venue->id}}" hidden name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Venre" required>
                                            </div>
                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Venue</button>
                                        </form>
                                      <form class="space-y-6" action="/adminDelete/v" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="number" value="{{$venue->id}}" hidden name="id" id="id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter New Name for Genre" required>
                                        <button type="submit" class="w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Delete Venue</button>
                                    </form>
                                  </div>
                              </div>
                          </div>
                      </div> 
                      
                            @else
                            <a href="/?venue={{$venue->name}}" class="inline-block py-3 px-4 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-white">{{$venue->name}}</a>
                            @endauth
                </li>
                @endforeach
                            @else 
                            <p>No venue found</p>
                        @endunless
            </ul>
        </div>
    </div>
</div>
