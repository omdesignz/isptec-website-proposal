@extends('layouts.backend')

@section('title')
Controles Deslizantes
@endsection

@section('search_helper')
Insira o nome do controle deslizante e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('pagesliders.index', []) }}
@endsection

@section('content')
<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">{{ $slider['title'] }}</h1>
        <p class="mt-2 text-sm text-gray-700">Modificar a <strong class="font-semibold text-gray-900">tradução</strong>.</p>
      </div>
      <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none group">
        <a href="{{ url()->previous() }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-900 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-yellow-400 sm:w-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
        </svg>
          <p class="group-hover:text-gray-900 text-white">Voltar</p>
        </a>
      </div>
    </div>

    <form method="post" action="{{ route('pagesliders.settranslation', ['slider' => $slider['id'], 'lang' => $lang]) }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="imgPreview" x-cloak>
        @method('PUT')  
        @csrf  
      <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Dados sobre o registo</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">Pode efectuar as alterações nos campos que seguem:</p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
          <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Página</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                  <select id="page_id" name="page_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm sm:max-w-xs sm:text-sm">
                    @foreach ($pages as $page)
                        <option value="{{ $page['id'] }}" @selected($slider['page_id'] == $page['id'])>{{ $page['title'] }}</option>
                    @endforeach
                  </select>
                </div>
                    @if($errors->has('page_id'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('page_id') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Nome</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $slider['title'] }}" type="text" name="title" id="title" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('title')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('title'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('title') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Largura</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $slider['width'] }}" type="number" name="width" id="width" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('width')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('width'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('width') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Altura</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $slider['height'] }}" type="number" name="height" id="height" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('height')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('height'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('height') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Intervalo</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ $slider['interval'] }}" type="number" name="interval" id="interval" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('interval')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('interval'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('interval') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Descrição</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                  <textarea id="description" name="description" rows="4" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('description')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">{{ $slider['description'] }}</textarea>
                    </div>
                    @if($errors->has('description'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('description') }}</p>
                    @endif
              </dd>
          </div>

          <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
            <dt class="text-sm font-medium text-gray-500 mb-2">Imagens</dt>
            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
              <div class="mt-1" x-data="imageHandler()">

                <div>
                  <div class="flow-root mt-6">
                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                      
                      <template x-for="(image, index) in images">
                      <li class="py-4">
                        <input :value="image.id" type="hidden" :name="`image[${index}][id]`" :id="`image[${index}][id]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">

                        <div class="flex items-center space-x-4">
                          <div class="flex h-44 w-96 rounded-md items-center justify-center">
                            <template x-if="!image.image">
                              <a href="#" @click.prevent="document.getElementById(`image[${index}][image]`).click()">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                              </svg>
                            </a>
                            </template>
                            <template x-if="image.image">
                              <a href="#" @click.prevent="document.getElementById(`image[${index}][image]`).click()">
                              <img :src="image.image" class="object-cover h-96 w-96 rounded-2xl" loading="lazy" />
                            </a>
                            </template>
                            <input class="cursor-pointer absolute hidden opacity-0 pin-r pin-t"
                              x-ref="`image[${index}][image]`"
                              type="file" @change="fileChosen(event, index)"
                              accept="image/*" 
                              :name="`image[${index}][image]`" 
                              :id="`image[${index}][image]`">
                            
                          </div>
                          <div class="flex-1 min-w-0">
                            {{-- <h2> --}}
                              <div>
                                <label :for="`image[${index}][title]`" class="block text-sm font-medium text-gray-700">Nome</label>
                                <div class="mt-1">
                                  <input :value="image.title" type="text" :name="`image[${index}][title]`" :id="`image[${index}][title]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                </div>
                                @if ($errors->has('image.*.title'))
                                <p class="mt-2 text-sm text-red-500">{{ $errors->first('image.*.title') }}</p>
                                @endif
                              </div>

                            {{-- </h2> --}}
                            <p class="text-sm font-medium text-gray-900 truncate">
                              <div>
                                <label :for="`image[${index}][link]`" class="block text-sm font-medium text-gray-700">Link</label>
                                <div class="mt-1">
                                  <input :value="image.link" type="url" :name="`image[${index}][link]`" :id="`image[${index}][link]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="">
                                </div>
                              </div>
                            </p>
                            
                            <p class="mt-1 text-xs text-gray-500">
                              <div>
                                <label :for="`image[${index}][description]`" class="block text-sm font-medium text-gray-700">Descrição</label>
                                <div class="mt-1">
                                  <textarea rows="4" :name="`image[${index}][description]`" :id="`image[${index}][description]`" class="shadow-sm block w-full sm:text-sm border-gray-300 rounded-md px-2.5 py-1.5 text-xs font-medium" placeholder="" x-text="image.description"></textarea>
                                </div>
                              </div>
                            </p>
                          </div>
                          <div>
                            <button @click="removeImage(index)" type="button" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-white hover:text-red-500 sm:w-auto">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 hover:scale-150" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                            </button>
                          </div>
                        </div>
                      </li>

                      </template>
                    </ul>
                  </div>
                  
                </div>

                <div class="overflow-hidden flex justify-end mt-4">
                  <button type="button" @click.prevent="addImage()" class="px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto flex justify-end rounded-md group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transform transition-all duration-200 group-hover:scale-150 group-hover:text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                      <span class="ml-2">Adicionar Imagens</span>
                  </button>
                  
              </div>

                  @if($errors->has('images'))
                  <p class="mt-2 text-sm text-red-500">{{ $errors->first('images') }}</p>
                  @endif
            </dd>
        </div>


            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500"></dt>
                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
                  <div class="mt-1">
                    <div class="flex justify-end">
                        <button type="submit" class="ml-3 rounded-md inline-flex justify-center px-2.5 py-1.5 text-xs font-medium bg-gray-900 text-white shadow-sm hover:bg-yellow-400 hover:text-gray-900 sm:w-auto">
                          Submeter
                        </button>
                      </div>
                  </div>
                     
                </dd>
            </div>
          </dl>
          
        </div>
    
        
      </div>
    </form>

</div>
@endsection

@section('page_footer_scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('imgPreview', () => ({
            imgsrc:null,
            previewFile() {
            let file = this.$refs.featured_image.files[0];
            if(!file || file.type.indexOf('image/') === -1) return;
            this.imgsrc = null;
            let reader = new FileReader();

            reader.onload = e => {
                this.imgsrc = e.target.result;
            }

            reader.readAsDataURL(file);
            
            }
        }));

        Alpine.data('imageHandler', (src='', index) => ({
            images: @json($slider['images']),
            imageUrl: src,

            addImage() {
              this.images.push({
                title: '',
                link: '',
                description: '',
                image: null,
              });
            },

            removeImage(index) {
              this.images.splice(index, 1);
            },

            fileChosen(event, index) {
              let file = event.target.files[0];
            if(!file || file.type.indexOf('image/') === -1) return;
            this.imageUrl = null;
            this.images[index].image = null;
            let reader = new FileReader();

            reader.onload = e => {
                this.imageUrl = e.target.result;
                this.images[index].image = e.target.result;
            }

            reader.readAsDataURL(file);
                },
        }));

    });
</script>
@endsection