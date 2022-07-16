<header class="text-gray-700 body-font border-b border-gray-200">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{route('home')}}">
       <img src="{{asset('sc-logo.png')}}" alt="" class="w-16 bg-red-900 px-2">
      </a>

      <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
        <a  href="{{route('home')}}" class="mr-5 hover:text-red-900 @if(request()->routeIs('home')) text-red-900 @endif">Home</a>
        <a href="{{route('dashboard')}}" class="mr-5 hover:text-red-900 @if(request()->routeIs('dashboard')) text-red-900 @endif">Dashboard</a>
      </nav>
    </div>
  </header>