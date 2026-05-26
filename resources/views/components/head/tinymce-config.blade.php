<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
 <script>
   tinymce.init({
     selector: '#body', // Replace this CSS selector to match the placeholder element for TinyMCE
     statusbar: true,
     plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    //  content_css: '/css/app.css',
    //  plugins: 'code table lists',
     toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
     toolbar_sticky: true,
     autosave_ask_before_unload: true,
     autosave_interval: '30s',
     autosave_retention: '2m',
     language: 'pt_BR',
     template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
     template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
     height: 600,
     image_caption: true,
     quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
     noneditable_class: 'mceNonEditable',
     toolbar_mode: 'sliding',
     contextmenu: 'link image table',
     quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
   });
 </script>