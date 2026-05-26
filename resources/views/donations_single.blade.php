@extends('layouts.front')

@section('content')
<!-- Page Header Section: Simple Dark With Cover -->
<div class="bg-cover bg-bottom" style="background-image: url('https://source.unsplash.com/Nyvq2juw4_o/1280x400');">
  <div class="bg-gray-800 bg-opacity-90">
    <div class="space-y-16 container xl:max-w-7xl mx-auto px-4 py-16 lg:px-8 lg:py-32">
      <div class="text-center">
        <div class="text-sm uppercase font-bold tracking-wider mb-1 text-indigo-300">
          Features
        </div>
        <h2 class="text-3xl md:text-4xl font-extrabold mb-4 text-white">
          Fully Responsive UI Components
        </h2>
        <h3 class="text-lg md:text-xl md:leading-relaxed font-medium text-gray-400 lg:w-2/3 mx-auto">
          Carefully coded and tested. You can use them to build the UI of your web project without ever leaving your HTML.
        </h3>
      </div>
    </div>
  </div>
</div>
<!-- END Page Header Section: Simple Dark With Cover -->

<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
  <h2 class="text-3xl leading-6 font-medium text-gray-900">
    Job Postings
  </h2><br>
  <div class="flex flex-col">
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-900">
            <tr>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                Name
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                Title
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                Email
              </th>
              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                Role
              </th>
            </tr>
          </thead>
          <tbody>
            <!-- Odd row -->
            <tr class="bg-white">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Jane Cooper
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Regional Paradigm Technician
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                jane.cooper@example.com
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Admin
              </td>
            </tr>

            <!-- Even row -->
            <tr class="bg-white">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                Cody Fisher
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Product Directives Officer
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                cody.fisher@example.com
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                Owner
              </td>
            </tr>

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>


@endsection

@section('footer_scripts')

@endsection