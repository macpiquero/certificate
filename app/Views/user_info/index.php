<div id="page-title">
    <h2>Participants</h2>
    <p></p>

    <div class="panel">

        <button class="btn btn-success " id="add">Add Participant</button>


        <?php if(isset($validation)):?>
            <div class="alert alert-warning">
               <?= $validation->listErrors() ?>
            </div>
        <?php endif;?>

        <?php if(isset($success)):?>
            <div class="alert alert-success">
               <?= $success ?>
            </div>
        <?php endif;?>



        <div class="panel-body" id="add-panel">
            <form method="post" action="<?php echo base_url(); ?>/users/add_participant">
                
                <div class="content-box-wrapper">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="firstname" placeholder="Firstname" value="" class="form-control" >
                            <span class="input-group-addon bg-blue">
                                <i class="glyph-icon icon-linecons-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="lastname" placeholder="Lastname" value="" class="form-control" >
                            <span class="input-group-addon bg-blue">
                                <i class="glyph-icon icon-linecons-user"></i>
                            </span>
                        </div>
                    </div>
                   
                   
                    <button class="btn btn-success btn-block">Save</button>
                </div>
            </form>
        </div>

        <div class="panel-body">
            <h3 class="title-hero">
                List of Participants
            </h3>
            <div class="example-box-wrapper">

                <div class="row">
                    <!-- CSRF token --> 
                    <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <table id="datatable-employee" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
        
    </div>

</div>

<?php
    $base_url_getemployee = base_url('users/get_participant');
    $json_base_url_getemployee = json_encode(['base_url' => $base_url_getemployee]);

?>

<script type="text/javascript">
    
    $(document).ready(function() {

        var base_url = <?php echo $json_base_url_getemployee; ?>;

        $('#add-panel').hide();

        $('#add').click(function(){
            $('#add-panel').toggle('slow');;
        });

        $('#datatable-employee').DataTable( {
            responsive: true,
             'processing': true,
         'serverSide': true,
         'serverMethod': 'post',
         'ajax': {
            url: base_url.base_url,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            type: 'post',
            'data': function(data){
               // CSRF Hash
               var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
               var csrfHash = $('.txt_csrfname').val(); // CSRF hash

               return {
                  data: data,
                  [csrfName]: csrfHash // CSRF Token
               };
            },
            dataSrc: function(data){

              // Update token hash
              $('.txt_csrfname').val(data.token);

              // Datatable data
              return data.aaData;
            }
         },
         'columns': [
            { data: 'id' },
            { data: 'name' },
            { data: 'action' },
         ]
        } );

    });

</script>