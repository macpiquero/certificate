<div id="page-title">
    <h2>Update Information</h2>
    <p></p>

    <div class="panel">

        <div class="panel-body" id="add-panel">
             <?php 
               // Display Response
               if(session()->has('message_emp')){
               ?>
                  <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                     <?= session()->getFlashdata('message_emp') ?>
                  </div>
               <?php
               }
             ?>

               <?php $validation = \Config\Services::validation(); ?>

            
                
                <div class="content-box-wrapper">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="firstname" placeholder="Firstname" id="firstname" value="<?php echo $participants['firstname'];?>" class="form-control" >
                            <span class="input-group-addon bg-blue">
                                <i class="glyph-icon icon-linecons-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="lastname" placeholder="Lastname" id="lastname" value="<?php echo $participants['lastname'];?>" class="form-control" >
                            <span class="input-group-addon bg-blue">
                                <i class="glyph-icon icon-linecons-user"></i>
                            </span>
                        </div>
                    </div>
                   
                   
                    <button class="btn btn-success btn-block" id="btn_update">Save</button>
                </div>
            
        </div>

      
        
    </div>
     <input type="hidden" name="id" placeholder="id" id="id" value="<?php echo $participants['id'];?>" class="form-control" >

</div>

<div id="page-title">
    <h2>Generate Certificate</h2>

     <div class="panel">
        <div class="panel-body">
             <form method="post" action="">
                 <div class="form-group">
                    <div class="">
                        <input type="hidden" name="name" placeholder="name" id="name" value="<?php echo $participants['firstname'].' '.$participants['lastname'];?>" class="form-control" >
                       
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Lessons</label>
                    <div class="col-sm-6">
                        <select class="form-control single" id="sel_lesson">
                            
                            <option value="">Select Lessons</option>
                            <?php
                                foreach ($lessons as $lesson) {
                            ?>
                            <option value="<?php echo $lesson->id; ?>"> <?php echo $lesson->title; ?></option>
                            <?php }?>

                            
                        </select>

                        <input type="hidden" name="select_lesson" id="select_lesson">
                    </div>
                </div>

                <button type="submit" name="generate" class="btn btn-primary" id="generate">Generate</button>
            </form>
        </div>
        
    </div>
</div>


    <br>
    <?php 
      if (isset($_POST['generate'])) {
        $name = strtoupper($_POST['name']);
        $name_len = strlen($name);
        $occupation = strtoupper($_POST['select_lesson']);
        if ($occupation) {
          $font_size_occupation = 24;
        }

        if ($name == "" || $occupation == "") {
          echo 
          "
          <div class='alert alert-danger col-sm-6' role='alert'>
              Ensure you fill all the fields!
          </div>
          ";
        }else{
          echo 
          "
          <div class='alert alert-success col-sm-6' role='alert'>
              Congratulations! $name on your excellent success.
          </div>
          ";

          //designed certificate picture
          $image = FCPATH . 'assets/certificate/certificate.jpg';

          $createimage = imagecreatefromjpeg($image);

          //this is going to be created once the generate button is clicked
          $output = FCPATH . 'assets/certificate/generated_cert/' . $name . '.jpg';

          //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
          $white = imagecolorallocate($createimage, 205, 245, 255);
          $black = imagecolorallocate($createimage, 0, 0, 0);

          //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
          $rotation = 0;

          //we then set the x and y axis to fix the position of our text name
          $origin_x = 400;
          $origin_y=350;

          //we then set the x and y axis to fix the position of our text occupation
          $origin1_x = 220;
          $origin1_y=480;

          //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
          if($name_len<=7){
            $font_size = 25;
            $origin_x = 190;
          }
          elseif($name_len<=12){
            $font_size = 30;
          }
          elseif($name_len<=15){
            $font_size = 26;
          }
          elseif($name_len<=20){
             $font_size = 18;
          }
          elseif($name_len<=22){
            $font_size = 15;
          }
          elseif($name_len<=33){
            $font_size=11;
          }
          else {
            $font_size =10;
          }

          $certificate_text = $name ;

          // //font directory for name
          $drFont = FCPATH .'assets/certificate/AspireDemibold-YaaO.ttf';

          // // font directory for occupation name
          $drFont1 = FCPATH . 'assets/certificate/Gotham-black.otf';

          // //function to display name on certificate picture
          // $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $certificate_text);

          // //function to display occupation name on certificate picture
          // $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $occupation);

          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont1, $certificate_text);
            if (!$text1) {
                die('imagettftext Error: ' . error_get_last()['message']);
            }

            $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $occupation);
            if (!$text2) {
                die('imagettftext Error: ' . error_get_last()['message']);
            }

          imagepng($createimage,$output,3);

 ?>
        <!-- this displays the image below -->
        <img src="<?= base_url('assets/certificate/generated_cert/'.$name.'.jpg');?>">
        <br> 
        <br>

        <input type="text" name="cert_path" id="cert_path" value="<?= base_url('assets/certificate/generated_cert/'.$name.'.jpg');?>">

        <!-- this provides a download button -->
        <a href="<?= base_url('assets/certificate/generated_cert/'.$name.'.jpg');?>" class="btn btn-success">Download Certificate</a>
        <br><br>
<?php 
        }
      }

     ?>

    </center>

   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

<?php
    $base_url_getemployee = base_url('participants/update_participant');
    $json_base_url_getemployee = json_encode(['base_url' => $base_url_getemployee]);


    $base_url_add_certificate = base_url('participants/add_certificate');
    $json_base_add_certificate = json_encode(['base_url' => $base_url_add_certificate]);

?>

<script type="text/javascript">
    
    $(document).ready(function() {

        var base_url = <?php echo $json_base_url_getemployee; ?>;
        var base_url_add_certificate = <?php echo $json_base_add_certificate; ?>;


        $('#btn_update').on('click', function(e){
         e.preventDefault();

         var emp_id = $('#id').val();

         var firstname = $('#firstname').val();
         var lastname = $('#lastname').val();
            // alert(emp_id + " " + emp_no);
       
            $.ajax({
                  url: base_url.base_url,
                  headers: {'X-Requested-With': 'XMLHttpRequest'},
                  type: 'post',
                  data: {
                     id: emp_id,
                     firstname: firstname,
                     lastname: lastname,
                  },
                  success: function(data){
                      if(data == 'success'){
                           location.reload();
                      }
                  },
                  error: function(xhr, status, error){
                       console.log("xhr: "+ xhr + "\n status: "+ status + "\n error: " + error);
                  }


            });
         
      });


        $('#sel_lesson').on('change', function(){
            $('#select_lesson').val($(this).find("option:selected").text());
        });


        $('#generate').on('click', function(event){
            // event.preventDefault();
            var participant_id = $('#id').val();
            var lesson_id = $('#sel_lesson').val();
            var cert_path = $('#cert_path').val();


            // alert(participant_id+ " "+lesson_id+" "+cert_path);
                $.ajax({
                      url: base_url_add_certificate.base_url,
                      headers: {'X-Requested-With': 'XMLHttpRequest'},
                      type: 'post',
                      data: {
                         participant_id: participant_id,
                         lesson_id: lesson_id,
                         path: cert_path
                      },
                      success: function(data){
                          
                      },
                      error: function(xhr, status, error){
                           console.log("xhr: "+ xhr + "\n status: "+ status + "\n error: " + error);
                      }


                });

        });

    });

</script>