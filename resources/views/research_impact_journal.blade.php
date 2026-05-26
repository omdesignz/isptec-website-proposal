@extends('layouts.front')

@section('content')
<div class="relative bg-white overflow-hidden">
  <div class="max-w-7xl mx-auto">
    <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
      <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
        <polygon points="50,0 100,0 50,100 0,100" />
      </svg>

      <div>
        <div class="relative pt-6 px-4 sm:px-6 lg:px-8">
          
        </div>
      </div>

      <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
        <div class="sm:text-center lg:text-left animate-fade-in-down">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block xl:inline">Publicações em</span>
            <span class="block text-isptec xl:inline">Revistas com Impacto</span>
          </h1>
          <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            
          </p>
        </div>
      </main>
    </div>
  </div>
  <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
    <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/campaign/2P7A2250.jpg') }}" alt="" loading="lazy"/>
  </div>
</div>

<div class="py-8 bg-gray-50 overflow-hidden lg:py-8">
    <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="relative rounded-lg border border-gray-300 bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-300 px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" loading="lazy"/>
              </div>
              <div class="flex-1 min-w-0">
                <a href="#" class="focus:outline-none">
                  <span class="absolute inset-0" aria-hidden="true"></span>
                  <p class="text-sm font-medium text-gray-900">Peterson Alves</p>
                  <p class="text-sm text-gray-500">Sample Article Sample Article Sample Article</p>
                  <p class="text-sm text-gray-500">F. Cangue, C. Barros</p>
                  <p class="text-sm text-gray-500">Awesome Journal</p>
                  <p class="text-sm text-gray-500">02/12/2021</p>
                </a>
              </div>
            </div>

            <div class="relative rounded-lg border border-gray-300 bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-300 px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                </div>
                <div class="flex-1 min-w-0">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    <p class="text-sm font-medium text-gray-900">Lola Mateus</p>
                    <p class="text-sm text-gray-500">The most Impactful Article you'll see</p>
                    <p class="text-sm text-gray-500">F. Cangue, C. Barros</p>
                    <p class="text-sm text-gray-500">People's Journal</p>
                    <p class="text-sm text-gray-500">26/02/2022</p>
                  </a>
                </div>
              </div>

              <div class="relative rounded-lg border border-gray-300 bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-300 px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2">
                <div class="flex-shrink-0">
                  <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" loading="lazy"/>
                </div>
                <div class="flex-1 min-w-0">
                  <a href="#" class="focus:outline-none">
                    <span class="absolute inset-0" aria-hidden="true"></span>
                    <p class="text-sm font-medium text-gray-900">Peterson Alves</p>
                    <p class="text-sm text-gray-500">Sample Article Sample Article Sample Article</p>
                    <p class="text-sm text-gray-500">F. Cangue, C. Barros</p>
                    <p class="text-sm text-gray-500">Awesome Journal</p>
                    <p class="text-sm text-gray-500">02/12/2021</p>
                  </a>
                </div>
              </div>
  
              <div class="relative rounded-lg border border-gray-300 bg-gradient-to-r from-yellow-100 via-yellow-200 to-yellow-300 px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2">
                  <div class="flex-shrink-0">
                      <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                  </div>
                  <div class="flex-1 min-w-0">
                    <a href="#" class="focus:outline-none">
                      <span class="absolute inset-0" aria-hidden="true"></span>
                      <p class="text-sm font-medium text-gray-900">Lola Mateus</p>
                      <p class="text-sm text-gray-500">The most Impactful Article you'll see</p>
                      <p class="text-sm text-gray-500">F. Cangue, C. Barros</p>
                      <p class="text-sm text-gray-500">People's Journal</p>
                      <p class="text-sm text-gray-500">26/02/2022</p>
                    </a>
                  </div>
                </div>
          
            <!-- More people... -->
          </div>
    </div>  


   
    
  </div>




  
  

@endsection

@section('footer_scripts')

@endsection