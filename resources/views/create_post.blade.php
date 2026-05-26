<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TinyMCE Test</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Insert the blade containing the TinyMCE configuration and source script -->
    <x-head.tinymce-config/>
  </head>
  <body>
    <h1>TinyMCE in Test</h1>
    <!-- Insert the blade containing the TinyMCE placeholder HTML element -->
  <div class="px-4 sm:px-6 lg:px-8 pt-12">
      <x-forms.tinymce-editor/>
  </div>
  </body>
</html>