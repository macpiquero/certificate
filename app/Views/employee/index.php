<div id="page-title">
    
    <h2>Employee Module</h2>
    <p><b>Active Financial Year: 2023</b></p>


</div>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/charts/piegage/piegage.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/widgets/charts/piegage/piegage-demo.js');?>"></script>
<div class="panel">
    <div class="panel-body">
           <div class="row">
                    <div class="content-box remove-border dashboard-buttons clearfix">
                        <a href="#" id="btn-upload-emloyee" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-upload"></i>
                            </span>
                            <span class="button-content">Upload CSV</span>
                        </a>
                        <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-fire"></i>
                            </span>
                            <span class="button-content">Tables</span>
                        </a>
                        <a href="#" class="btn vertical-button hover-purple" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-bar-chart-o"></i>
                            </span>
                            <span class="button-content">Charts</span>
                        </a>
                        <a href="#" class="btn vertical-button hover-yellow" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-laptop"></i>
                            </span>
                            <span class="button-content">Buttons</span>
                        </a>
                        <a href="#" class="btn vertical-button hover-azure" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-code"></i>
                            </span>
                            <span class="button-content">Panels</span>
                        </a>
                        <a href="#" class="btn vertical-button hover-blue" title="">
                            <span class="glyph-icon icon-separator-vertical">
                                <i class="glyph-icon icon-picture-o"></i>
                            </span>
                            <span class="button-content">Themes</span>
                        </a>
                    </div>

                   <div class="col-md-12" >
                       <div class="row">
                        <?php 
                          // Display Response
                          if(session()->has('message')){
                          ?>
                             <div class="alert <?= session()->getFlashdata('alert-class') ?>">
                                <?= session()->getFlashdata('message') ?>
                             </div>
                          <?php
                          }
                        ?>

                          <?php $validation = \Config\Services::validation(); ?>
                        </div>
                   </div>
                   <div class="col-md-12" id="file-upload-element">
                      

                      <form method="post" action="<?=base_url('employee/upload_csv')?>" enctype="multipart/form-data">

                         <?= csrf_field(); ?>
                         <div class="form-group">
                            <label for="file">File:</label>

                            <input type="file" class="form-control" id="file" name="file" />
                            <!-- Error -->
                            <?php if( $validation->getError('file') ) {?>
                            <div class='alert alert-danger mt-2'>
                               <?= $validation->getError('file'); ?>
                            </div>
                            <?php }?>

                         </div>

                         <input type="submit" class="btn btn-success" name="submit" value="Import CSV">
                      </form>
                   </div>

            </div>
    </div>
</div>
<div class="panel">
    
    <div class="panel-body">
        <h3 class="title-hero">
            List of Employees information and status in your company.
        </h3>
        <div class="example-box-wrapper">

            <div class="row">
                <!-- CSRF token --> 
                <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <table id="datatable-employee" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Company Email</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Employee ID</th>
                        <th>Name</th>
                        <th>Company Email</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
</div>




<!-- jQueryUI Autocomplete -->

<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/autocomplete.js");?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/menu.js");?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/widgets/input-switch/inputswitch-alt.js");?>"></script>



<?php
  $base_url_getemployee = base_url('employee/get_employee');
  $json_base_url_getemployee = json_encode(['base_url' => $base_url_getemployee]);


  $url_ajaxCellLeaderList = base_url('cell_leader_list');
  $json_url_ajaxCellLeaderList = json_encode(['base_url' => $url_ajaxCellLeaderList]);
  // echo $json_base_url;
?>

<script>
    $(document).ready(function() {

        var base_url = <?php echo $json_base_url_getemployee; ?>;

        $('#file-upload-element').hide();

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
            { data: 'employee_id' },
            { data: 'name' },
            { data: 'company_email' },
            { data: 'birthdate' },
            { data: 'action' },
         ]
        } );

        $('.dataTables_filter input').attr("placeholder", "Search...");

        $('#btn-upload-emloyee').on('click', function(e){
            e.preventDefault();
            $('#file-upload-element').toggle();

        });  
    });

</script>

<script type="text/javascript" src="<?php echo base_url("assets/widgets/autocomplete/autocomplete-demo.js");?>"></script>

<!-- <script type="text/javascript" src="<?php echo base_url('assets/js-file/church_member.js');?>"></script> -->