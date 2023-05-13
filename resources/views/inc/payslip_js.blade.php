<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');	
    
    /* ************************************** Function to show if there is just one device in the database *************** */
    $(document).ready(function () {
   
/* ****************************** If it is a two State Device *************** */
$('#generate_slip').click(function (e) { 
    
                e.preventDefault();
                const month = $('#month').val();
                const year  = $('#year').val();
                const url = "{{route('paySlip')}}";
                 $.ajax({
                url: url,
                type: 'GET',
                data:{year:year, month:month},
                cache:false,
                success: function(response){
                   $('#data').html(response.data);
                   $('#month').val(month);
                   $('#year').val(year);
                
                    }
                });  
            })
    });

</script>
    