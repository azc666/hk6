{{-- {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') !!} --}}
<script src="//code.jquery.com/jquery-2.2.4.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>

{!! Html::script('/js/parsley.min.js') !!}

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js">
</script>

<script type="text/javascript">
    $('textarea').maxlength({
          alwaysShow: true,
          threshold: 10,
          warningClass: "label label-success",
          limitReachedClass: "label label-danger",
          separator: ' out of ',
          preText: 'You have written ',
          postText: ' characters allowed.',
          validate: true
    });
</script>

<script>
  $(document).ready(function(){
    //   $('#myorders-table').DataTable({
    //     "columnDefs": [
    //       {
    //         "targets": [4],
    //         "visible": false,
    //       }
    //     ],
    //     stateSave: true,
    //     "order": [[ 1, "asc" ]],
    // });
    var historiektable = $('#myorders-table').DataTable({
      "stateSave": true,
      "order": [[ 1, "asc" ]],
      "paging" : true,
      "ordering" : true,
      "scrollCollapse" : true,
      "searching" : true,
      "columnDefs" : [{"targets":4,  "visible": false, "type":"date-eu"}],
      "bInfo": true
    });
  });
</script>

<script>
    $(document).ready(function(){
      $('#mytitles-table').DataTable();
      

    } );
      // {
      //   "columnDefs": [
      //     {
      //       "targets": [3],
      //       "visible": false,
      //     }
      //   ],
      //   stateSave: true,
      //   "type": [[ 1, "asc" ]],
      // dom: 'Bfrtip',
      // buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print' ]
//     });
// });
</script>

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
<script src=//cdn.datatables.net/plug-ins/1.10.11/sorting/date-eu.js></script>

{{-- <script src="/js/Event.js"></script>
<script src="/js/Magnifier.js"></script>

<script type="text/javascript">
    var evt = new Event(),
    m = new Magnifier(evt);
</script> --}}

<script src="/js/jquery.magnify.js"></script>
{{-- Optional mobile plugin (uncomment the line below to enable): --}}
<script src="/js/jquery.magnify-mobile.js"></script>

<script>
    function myFunction() {
        window.print();
    }
</script>

<script>
  function ConfirmDelete()
  {
  var x = confirm("Are you sure you want to delete this title?");
  if (x)
    return true;
  else
    return false;
  }
</script>

