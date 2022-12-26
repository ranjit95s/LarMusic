<x-layout>
    @include('partials._nav')
    <section class="container-fluid h-100 main-bg mt-5">
        <style scoped>
                        [x-cloak] {
            display: none;
            }
            .svg-icon {
            width: 1em;
            height: 1em;
            }
            .svg-icon path,
            .svg-icon polygon,
            .svg-icon rect {
            fill: #333;
            }
            .svg-icon circle {
            stroke: #4691f6;
            stroke-width: 1;
            }
        </style>
        <div class="flex w-full justify-center">
            <form class="relative bg-white p-4 w-9/12 rounded-lg shadow dark:bg-gray-700"  method="POST" action="/events" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="text-center text-lg">
                    <h4 class="mt-1 mb-5 pb-1 text-white">Create Form, Boss!</h4>
                </div>
                <div class="flex flex-wrap w-full flex-row justify-center items-start">
                    
                    <div class="mb-6 w-2/5 m-2">
                        <label for="artist_Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Artist Name</label>
                        {{-- <input type="artist_Name" name="artist_Name" value="{{old('artist_Name')}}" id="artist_Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" > --}}
                        <select id="artist_Name" name="artist_Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Choose a Artist</option>
                            @foreach ($artists as $artist)
                            <option value="{{$artist->name}}">{{$artist->name}}</option>
                            @endforeach
                            </select>
                        @error('artist_Name')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6 w-2/5 m-2">
                        <label for="gerne" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres</label>
                        {{-- <input type="text" name="gerne" value="{{old('gerne')}}" id="gerne" class="bg-gray-50 none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" > --}}
                       {{-- st --}}
                       <select name="gerne" x-cloak id="select" multiple>
                        @foreach ($geners as $gener)
                        <option value="{{$gener->name}}">{{$gener->name}}</option>
                        @endforeach
                      </select>
                      
                      <div x-data="dropdown()" x-init="loadOptions()" class="w-full flex flex-col mx-auto">
                        <input name="gerne" type="hidden" x-bind:value="selectedValues()">
                        <div class="inline-block relative">
                          <div class="flex flex-col items-center relative">
                            <div x-on:click="open" class="w-full">
                              <div class="p-1 flex bg-gray-50 none border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <div class="flex flex-auto flex-wrap">
                                  <template x-for="(option,index) in selected" :key="options[option].value">
                                    <div class="flex justify-center items-center m-1 font-medium py-1 px-1 rounded bg-gray-500 border">
                                      <div class="text-xs font-normal leading-none max-w-full flex-initial x-model=" options[option] x-text="options[option].text"></div>
                                      <div class="flex flex-auto flex-row-reverse">
                                        <div x-on:click.stop="remove(index,option)">
                                          <svg class="fill-current h-4 w-4 " role="button" viewBox="0 0 20 20">
                                            <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                 c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                 l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                 C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                          </svg>
                      
                                        </div>
                                      </div>
                                    </div>
                                  </template>
                                  <div x-show="selected.length == 0" class="flex-1">
                                    <input placeholder="Select a option" class="bg-transparent p-1 px-2 appearance-none outline-none h-full w-full text-gray-800" x-bind:value="selectedValues()">
                                  </div>
                                </div>
                                <div class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                      
                                  <button type="button" x-show="isOpen() === true" x-on:click="open" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                    <svg version="1.1" class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                      <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                          c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                          L17.418,6.109z" />
                                    </svg>
                      
                                  </button>
                                  <button type="button" x-show="isOpen() === false" @click="close" class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                      <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
                          c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
                          " />
                                    </svg>
                      
                                  </button>
                                </div>
                              </div>
                            </div>
                            <div class="w-full px-4">
                              <div x-show.transition.origin.top="isOpen()" class="absolute shadow top-100 bg-white z-40 w-full left-0 rounded max-h-select" x-on:click.away="close">
                                <div class="flex flex-col w-full overflow-y-auto h-fit">
                                  <template x-for="(option,index) in options" :key="option" class="overflow-auto">
                                    <div class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100" @click="select(index,$event)">
                                      <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                        <div class="w-full items-center flex justify-between">
                                          <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                          <div x-show="option.selected">
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                              <path fill="none" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                                                  C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                                                  L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z"></path>
                                            </svg>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </template>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                       {{-- st --}}


                        @error('gerne')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>
                      
                    <div class="mb-6 w-2/5 m-2">
                        <label for="shortDesc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Describe</label>
                        <input type="text" id="shortDesc" name="shortDesc" value="{{old('shortDesc')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Short Description" >
                        @error('shortDesc')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="mb-6 w-2/5 m-2">
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                        <input type="number" placeholder="Amount" id="amount" name="amount" value="{{old('amount')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                        @error('amount')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                @enderror
                    </div>
                      
                    <div class="mb-6 w-2/5 m-2">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                        <input type="date" name="date" value="{{old('date')}}" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" >
                        @error('date')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="mb-6 w-2/5 m-2">
                        <label for="venue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Venue</label>
                        {{-- <input type="text" name="venue" value="{{old('venue')}}" id="venue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" > --}}
                        <select id="venue" name="venue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected disabled>Choose a Venue</option>
                            @foreach ($venues as $venue)
                            <option value="{{$venue->name}}, {{$venue->address}},{{$venue->contact}}">{{$venue->name}}</option>
                            {{-- <input type="text" {{$venue->id}} name="vid" hidden id=""> --}}
                            @endforeach
                            </select>

                        @error('venue')
                        <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6 w-3/5 m-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload multiple files</label>
                        <input name="image" class="block p-2 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" type="file">
                    </div>
                </div>
                <button type="submit" class="text-white flex flex-col w-full justify-center items-center bg-orange-700 hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Submit</button>
                </form>
            </div>
    </section>
    <script>
        function dropdown() {
                return {
                    options: [],
                    selected: [],
                    show: false,
                    open() { this.show = true },
                    close() { this.show = false },
                    isOpen() { return this.show === true },
                    select(index, event) {

                        if (!this.options[index].selected) {

                            this.options[index].selected = true;
                            this.options[index].element = event.target;
                            this.selected.push(index);

                        } else {
                            this.selected.splice(this.selected.lastIndexOf(index), 1);
                            this.options[index].selected = false
                        }
                    },
                    remove(index, option) {
                        this.options[option].selected = false;
                        this.selected.splice(index, 1);


                    },
                    loadOptions() {
                        const options = document.getElementById('select').options;
                        for (let i = 0; i < options.length; i++) {
                            this.options.push({
                                value: options[i].value,
                                text: options[i].innerText,
                                selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                            });
                        }


                    },
                    selectedValues(){
                        return this.selected.map((option)=>{
                            return this.options[option].value;
                        })
                    }
                }
            }
    </script>
</x-layout>