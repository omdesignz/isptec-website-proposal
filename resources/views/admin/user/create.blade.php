@extends('layouts.backend')

@section('title')
Usuários
@endsection

@section('search_helper')
Insira o nome do usuário e prima ENTER para pesquisar...
@endsection

@section('search_url')
{{ route('users.index', []) }}
@endsection

@section('content')

<div class="px-4 sm:px-6 lg:px-8 mt-8">
    <div class="sm:flex sm:items-center">
      <div class="sm:flex-auto">
        <h1 class="text-xl font-semibold text-gray-900">Usuários</h1>
        <p class="mt-2 text-sm text-gray-700">Partilha os acontecimentos da instituição com o <strong class="font-semibold text-gray-900">mundo</strong>.</p>
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

    <form method="post" action="{{ route('users.store') }}" class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" x-data="{}" x-cloak> 
        @csrf  
      <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Dados sobre o registo</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
          <dl class="sm:divide-y sm:divide-gray-200">
            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Nome</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ old('name') }}" type="text" name="name" id="name" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('name')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('name'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('name') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Email</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ old('email') }}" type="email" name="email" id="email" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('email')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('email'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('email') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Usuário</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ old('username') }}" type="text" name="username" id="username" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('username')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('username'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('username') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Senha</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ old('password') }}" type="password" name="password" id="password" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('password')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('password'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('password') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500">Confirmar Senha</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                <div class="mt-1">
                    <input value="{{ old('password_confirmation') }}" type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-gray-300 shadow-sm @if($errors->has('password_confirmation')) focus:border-rose-500 focus:ring-rose-500 @endif sm:text-sm">
                    </div>
                    @if($errors->has('password_confirmation'))
                    <p class="mt-2 text-sm text-red-500">{{ $errors->first('password_confirmation') }}</p>
                    @endif
              </dd>
            </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 mb-2">Funções</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
                <div class="mt-1">
                  <fieldset class="border-t border-b border-gray-200">
                    <legend class="sr-only">Roles</legend>
                    <div class="divide-y divide-gray-200" x-data="rolecheckboxes()">
                      <div class="relative flex items-start py-4">
                        <div class="min-w-0 flex-1 text-sm">
                          <label for="selectAll" class="font-medium text-gray-700">Todas</label>
                          <p id="selectAll-description" class="text-gray-500">Seleccionar todas as funções</p>
                        </div>
                        <div class="ml-3 flex h-5 items-center">
                          <input id="roleselectAll" aria-describedby="selectAll-description" name="roleselectAll" type="checkbox" class="h-4 w-4 rounded-full border-gray-300 text-yellow-400 focus:ring-yellow-400" @click="selectAllCheckboxes">
                        </div>
                      </div>
                      @foreach ($roles as $role)
                        <div class="relative flex items-start py-4">
                          <div class="min-w-0 flex-1 text-sm">
                            <label for="role-{{ $role['id'] }}" class="font-medium text-gray-700">{{ $role['label'] }}</label>
                            <p id="role-{{ $role['id'] }}-description" class="text-gray-500">{{ $role['name'] }}</p>
                          </div>
                          <div class="ml-3 flex h-5 items-center">
                            <input x-model="roles" value="{{ $role['id'] }}" id="role-{{ $role['id'] }}" aria-describedby="role-{{ $role['id'] }}-description" name="roles[]" type="checkbox" class="h-4 w-4 roleselectAll rounded-full border-gray-300 text-yellow-400 focus:ring-yellow-400">
                          </div>
                        </div>
                      @endforeach
                      
                    </div>
                  </fieldset>
                </div>
  
                  
              </dd>
          </div>

            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
              <dt class="text-sm font-medium text-gray-500 mb-2">Permissões Directas</dt>
              <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-6">
                <div class="mt-1">
                  <fieldset class="border-t border-b border-gray-200">
                    <legend class="sr-only">Permissions</legend>
                    <div class="divide-y divide-gray-200" x-data="checkboxes()">
                      <div class="relative flex items-start py-4">
                        <div class="min-w-0 flex-1 text-sm">
                          <label for="selectAll" class="font-medium text-gray-700">Todas</label>
                          <p id="selectAll-description" class="text-gray-500">Seleccionar todas as permissões</p>
                        </div>
                        <div class="ml-3 flex h-5 items-center">
                          <input id="selectAll" aria-describedby="selectAll-description" name="selectAll" type="checkbox" class="h-4 w-4 rounded-full border-gray-300 text-yellow-400 focus:ring-yellow-400" @click="selectAllCheckboxes">
                        </div>
                      </div>
                      @foreach ($permissions as $permission)
                        <div class="relative flex items-start py-4">
                          <div class="min-w-0 flex-1 text-sm">
                            <label for="permission-{{ $permission['id'] }}" class="font-medium text-gray-700">{{ $permission['label'] }}</label>
                            <p id="permission-{{ $permission['id'] }}-description" class="text-gray-500">{{ $permission['name'] }}</p>
                          </div>
                          <div class="ml-3 flex h-5 items-center">
                            <input x-model="permissions" value="{{ $permission['id'] }}" id="permission-{{ $permission['id'] }}" aria-describedby="permission-{{ $permission['id'] }}-description" name="permissions[]" type="checkbox" class="h-4 w-4 selectAll rounded-full border-gray-300 text-yellow-400 focus:ring-yellow-400">
                          </div>
                        </div>
                      @endforeach
                      
                    </div>
                  </fieldset>
                </div>
  
                  
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
      Alpine.data('checkboxes', () => ({
          selectAll: false,
          permissions: [],

          selectAllCheckboxes() {
              this.selectAll = !this.selectAll

              let checkboxes = document.querySelectorAll('.selectAll');
              let allValues = [];

              [...checkboxes].map((el) => {
                  allValues.push(el.value)

                  this.permissions = this.selectAll ? allValues : []
              })
          }
      }));

      Alpine.data('rolecheckboxes', () => ({
          selectAll: false,
          roles: [],

          selectAllCheckboxes() {
              this.selectAll = !this.selectAll

              let checkboxes = document.querySelectorAll('.roleselectAll');
              let allValues = [];

              [...checkboxes].map((el) => {
                  allValues.push(el.value)

                  this.roles = this.selectAll ? allValues : []
              })
          }
      }));
  })
</script>
@endsection