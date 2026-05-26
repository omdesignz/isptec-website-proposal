<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true"  x-show="openForm" @keydown.window.escape="openForm = false" x-cloak>
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0"></div>
  
    <div class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
          <!--
            Slide-over panel, show/hide based on slide-over state.
  
            Entering: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-full"
              To: "translate-x-0"
            Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
              From: "translate-x-0"
              To: "translate-x-full"
          -->
          <div class="pointer-events-auto w-screen max-w-md" x-show="openForm" x-cloak
            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" 
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full"
          >
            <form class="flex h-full flex-col divide-y divide-gray-200 bg-white shadow-xl" action="/admin/newslettercategories" method="POST">
              @csrf
              <div class="h-0 flex-1 overflow-y-auto">
                <div class="bg-yellow-400 py-6 px-4 sm:px-6">
                  <div class="flex items-center justify-between">
                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Nova Categoria</h2>
                    <div class="ml-3 flex h-7 items-center">
                      <button @click="openForm = false" type="button" class="rounded-md bg-yellow-400 text-gray-900 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="sr-only">Close panel</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  <div class="mt-1">
                    <p class="text-sm text-gray-700">Queira por favor preencher o formulário abaixo e clicar em <b>SUBMETER</b>.</p>
                  </div>
                </div>
                <div class="flex flex-1 flex-col justify-between">
                  <div class="divide-y divide-gray-200 px-4 sm:px-6">
                    <div class="space-y-6 pt-6 pb-5">
                      <div>
                        <label for="name" class="block text-sm font-medium text-gray-900"> Nome </label>
                        <div class="mt-1">
                          <input type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('name')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                        </div>
                        @if($errors->has('name'))
                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('name') }}</p>
                        @endif
                      </div>

                      <div>
                        <label for="description" class="block text-sm font-medium text-gray-900"> Descrição </label>
                        <div class="mt-1">
                          <textarea id="description" name="description" rows="4" class="block w-full rounded-md border border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 sm:text-sm"></textarea>
                        </div>
                        @if($errors->has('description'))
                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('description') }}</p>
                        @endif
                      </div>

                      <div>
                        <label for="period" class="block text-sm font-medium text-gray-900"> Envios p/ Mês </label>
                        <div class="mt-1">
                          <input type="number" name="period" id="period" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('period')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                        </div>
                        @if($errors->has('period'))
                        <p class="mt-2 text-sm text-red-500">{{ $errors->first('period') }}</p>
                        @endif
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
              <div class="flex flex-shrink-0 justify-end px-4 py-4">
                <button type="submit" class="ml-4 inline-flex justify-center rounded-md border border-transparent bg-gray-900 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 focus:outline-none">Submeter</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>