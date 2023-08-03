<div id="page-title">
    <h2>Church Member Module</h2>
    <p>You may see all church member here</p>


</div>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/charts/piegage/piegage.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/charts/piegage/piegage-demo.js');?>"></script>
<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            List of active Members / Primary Leaders / Cell Leaders
        </h3>
        <div class="example-box-wrapper">
            <div class="row">

                 <div class="col-md-4">
                    <div class="tile-box bg-white content-box">
                        <div class="tile-header">
                            Total Member's
                            <div class="float-right">
                                
                                <a href="#" data-toggle="modal" data-target=".bs-modal-add-member"><i class="glyph-icon icon-plus"></i> Add new member</a>
                                
                                
                            </div>
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-retweet"></i>
                            <div class="tile-content">
                                32
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <a href="#" title="Example box" class="tile-box btn btn-info">
                        <div class="tile-header">
                            Cell Leader's
                            <div class="float-right">
                                <!-- <i class="glyph-icon icon-caret-up"></i> -->
                                Click to update
                            </div>
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-retweet"></i>
                            <div class="tile-content">
                                32
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                    <a href="#" title="Example box" class="tile-box btn btn-primary">
                        <div class="tile-header">
                            Primary Leader's
                            <div class="float-right">
                                <!-- <i class="glyph-icon icon-caret-up"></i> -->
                                Click to update
                            </div>
                        </div>
                        <div class="tile-content-wrapper">
                            <i class="glyph-icon icon-fire"></i>
                            <div class="tile-content">
                                20
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bs-modal-add-member" id="bs-modal-add-member" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                
                <h4 class="modal-title">Add Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" >
                <div class="panel-body">
                    <h3 class="title-hero">
                        Personal Information
                    </h3>
                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Firstname</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="firstname" placeholder="Enter firstname...">
                            </div>
                        </div>
                    </div>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Lastname</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="lastname" placeholder="Enter lastname...">
                            </div>
                        </div>
                    </div>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email Address</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" id="email" placeholder="Enter email address...">
                            </div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <div class="example-box-wrapper">
                         <div class="form-group">
                            <label class="col-sm-3 control-label">Cell Leader Name</label>
                            <div class="col-sm-6">
                                <input type="text" name="" placeholder="Start typing to see results..." class="form-control autocomplete-input">
                            </div>
                            <span id="cell_leader_id"></span>
                        </div>
                    </div>

                    <h3 class="title-hero">
                        PEPSOL Training
                    </h3>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pre Encounter</label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="input-switch-alt" id="pre_encounter">
                            </div>
                        </div>
                    </div>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Encounter</label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="input-switch-alt" id="encounter">
                            </div>
                        </div>
                    </div>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Post Encounter</label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="input-switch-alt" id="post_encounter">
                            </div>
                        </div>
                    </div>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">SOL 1</label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="input-switch-alt" id="sol1">
                            </div>
                        </div>
                    </div>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">SOL 2</label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="input-switch-alt" id="sol2">
                            </div>
                        </div>
                    </div>

                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">SOL 3</label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="input-switch-alt" id="sol3">
                            </div>
                        </div>
                    </div>
                    <div class="example-box-wrapper">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Have already a cell member?</label>
                            <div class="col-sm-6">
                                <input type="checkbox" class="input-switch-alt" id="is_cell_leader">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="example-box-wrapper">
                     <span>If you click close, all information will be loss!</span>
                </div>
            </div>

            
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save_add_member">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- jQueryUI Autocomplete -->

<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/autocomplete.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/menu.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/widgets/input-switch/inputswitch-alt.js");?>"></script>



<?php
  $base_url_addMemberdataRequest = base_url('addMemberdataRequest');
  $json_base_url_addMemberdataRequest = json_encode(['base_url' => $base_url_addMemberdataRequest]);


  $url_ajaxCellLeaderList = base_url('cell_leader_list');
  $json_url_ajaxCellLeaderList = json_encode(['base_url' => $url_ajaxCellLeaderList]);
  // echo $json_base_url;
?>

<script>
    $(document).ready(function() {
        var base_url = <?php echo $json_base_url_addMemberdataRequest; ?>;
        // $('.input-switch-alt').prop('checked', false);    
        
        getCellLeaderList();


        $('#save_add_member').click(function(){

              var firstname = $('#firstname').val();
              var lastname = $('#lastname').val();
              var email = $('#email').val();
              var cell_leader_id = $('#cell_leader_id').html();
              var is_cell_leader = $('#is_cell_leader').is(':checked');
              var pre_encounter = $('#pre_encounter').is(':checked');
              var encounter = $('#encounter').is(':checked');
              var post_encounter = $('#post_encounter').is(':checked');
              var sol1 = $('#sol1').is(':checked');
              var sol2 = $('#sol2').is(':checked');
              var sol3 = $('#sol3').is(':checked');

              var data = [];


              data = [{
                    firstname: firstname,
                    lastname: lastname,
                    email: email,
                    cell_leader_id: cell_leader_id,
                    if_cell_leader: is_cell_leader,
                    pre_encounter: pre_encounter,
                    encounter: encounter,
                    post_encounter: post_encounter,
                    sol1: sol1,
                    sol2: sol2,
                    sol3: sol3
                }];


              // console.log(data);

              if(firstname.length==0){
                   sweetAlertValidation('Please enter firstname!', 'firstname');
                   return;
              }else if(lastname.length==0){
                   sweetAlertValidation('Please enter lastname!', 'lastname');
                   return;
              }else{
                   $.ajax({
                        url: base_url.base_url,
                        headers: {'X-Requested-With': 'XMLHttpRequest'},
                        type: 'post',
                        // dataType: 'json',
                        // contentType: 'application/json',
                        // data: JSON.stringify(data),
                        data: {
                            firstname: firstname,
                            lastname: lastname,
                            email: email,
                            cell_leader_id: cell_leader_id,
                            if_cell_leader: is_cell_leader,
                            pre_encounter: pre_encounter,
                            encounter: encounter,
                            post_encounter: post_encounter,
                            sol1: sol1,
                            sol2: sol2,
                            sol3: sol3
                        },
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
         // Bind a function to the modal's hidden.bs.modal event
        $('#bs-modal-add-member').on('hidden.bs.modal', function(e) {
            e.preventDefault();
            // Clear the value of all input fields
            $('#bs-modal-add-member input').val('');

            // Clear the value of all span elements
            $('#bs-modal-add-member span').html('');
            
            // Uncheck all checkbox
            $('.input-switch-alt ').prop('checked', false);

            $('.switch-toggle').removeClass('switch-on');
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


    function getCellLeaderList(){
        var url_ajaxCellLeaderList = <?php echo $json_url_ajaxCellLeaderList; ?>;
        
        $.ajax({
            url: url_ajaxCellLeaderList.base_url,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'get',
            dataType: 'json',
            success: function(data){

                var dataArray = [];
                $.each(data, function(index, user) {
                    dataArray.push({
                        label: user.firstname + " " +user.lastname,
                        value: user.id
                    });
                });

                // console.log(dataArray);
                 autocompleteCellLeaderList(dataArray);
                 // console.log(data);
            },
            error: function(xhr, status, error){
                 console.log("xhr: "+ xhr + "\n status: "+ status + "\n error: " + error);
            }


       });

    }

    function autocompleteCellLeaderList(data){
         $(".autocomplete-input").autocomplete({
            source: data,
            select: function(event, ui){
                $('#cell_leader_id').html(ui.item.value);
                $(this).val(ui.item.label);
                return false;
            }
        });
    }
</script>

<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/autocomplete-demo.js");?>"></script>

<!-- <script type="text/javascript" src="<?php echo base_url('assets/js-file/church_member.js');?>"></script> -->