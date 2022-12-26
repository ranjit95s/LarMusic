<x-layout>
@include('partials._nav')
<section class="container-fluid mt-5 h-100 main-bg">
    <div class="flex w-full justify-center">
        <form class="relative bg-white p-4 w-3/6 rounded-lg shadow dark:bg-gray-700"  method="POST" action="/users" autocomplete="off">
            @csrf
            <div class="text-center text-lg">
                <h4 class="mt-1 mb-5 pb-1 text-white">Login, Boss!</h4>
            </div>
            <div class="flex flex-wrap w-full flex-row justify-center items-center">
                
                <div class="mb-6 w-full m-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                    <input type="email" name="email" value="{{old('email')}}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" >
                    @error('email')
                    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6 w-full m-2">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" value="{{old('password')}}" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                    @error('gerne')
                    <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                @enderror
                </div>
            </div>
            <button type="submit" class="text-white flex flex-col w-full justify-center items-center bg-[color:var(--primary-text-color)] hover:bg-[color:var(--primary-text-color)]-800 focus:ring-4 focus:outline-none focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-[color:var(--primary-text-color)]-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            
          </form>
          
                </div>
</section>
</x-layout>