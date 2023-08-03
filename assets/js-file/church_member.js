$(document).ready(function(){

     var base_url = "<?php echo base_url();?>";

     var firstname , lastname , email;

     alert();

     $('#save_add_member').click(function(){

          firstname = $('#firstname').val();
          lastname = $('#lastname').val();
          email = $('#email').val();

         

          if(firstname.length==0){
               sweetAlertValidation('Please enter firstname!', 'firstname');
               return;
          }else if(lastname.length==0){
               sweetAlertValidation('Please enter lastname!', 'lastname');
               return;
          }else{
               $.ajax({
                    url: "<?php echo base_url('addMemberdataRequest');?>",
                    headers: {'X-Requested-With': 'XMLHttpRequest'},
                    type: 'post',
                    dataType: 'json',
                    data: {data: firstname},
                    success: function(data){
                         console.log(data);
                    },
                    error: function(xhr, status, error){
                         console.log("xhr: "+ xhr + "\n status: "+ status + "\n error: " + error);
                    }


               });
          }




     });

     $('#bs-modal-add-member').on('shown.bs.modal', function () {
         $('#firstname').focus();
     });

});


function sweetAlertValidation(input, focusText){
     Swal.fire({
       title: 'Ooops!',
       text: input,
       icon: 'warning',
       showCancelButton: false,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Okay'
     }).then((result) => {
       $('#'+focusText).focus();
     })
}