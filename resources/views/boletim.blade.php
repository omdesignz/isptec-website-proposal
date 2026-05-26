@extends('layouts.front')
@section('content')

<div id="adobe-dc-view" ></div>
    <script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
      <script type="text/javascript">
        document.addEventListener("adobe_dc_view_sdk.ready", function(){
          var adobeDCView = new AdobeDC.View({clientId: "b60526a01dbb40a8a7b9ee61001e07dd", divId: "adobe-dc-view"});
          adobeDCView.previewFile({
            content:{ location:
              { url: "{{ url('/NL_ISPTEC_Edicao_N.1_2022.pdf') }}"}},
            metaData:{fileName: "NL_ISPTEC_Edicao_N.1_2022.pdf"}
          },
          {
            embedMode: "IN_LINE",
            showDownloadPDF: false,
            showPrintPDF: false,
          });
        });
      </script>
  </div>
@endsection