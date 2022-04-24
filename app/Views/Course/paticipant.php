<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Paticipants</h3>
    </div>
    <div class="card-body">

        <div class="list">


<div class="d-flex justify-content-end" >
<a href="../../public/Templaceuploadpaticipant.xlsx" style="margin-right: 20px;"><button class="btn btn-secondary" >
<i class="fa fa-download" aria-hidden="true"></i></button></a>
        <form method="post" action="<?= base_url('course/uploadfilexls/' . $id) ?>" enctype="multipart/form-data" id="myform" >
        <div class="input-group">
            <input type="file"  class="form-control" id="fileupload" name="fileupload">
    <button class="btn btn-secondary "><?php echo lang('component.Upload'); ?></button>
    </div>
</form>
<button class="btn btn-primary" style="margin-left: 20px;" onclick="return register()"><i class="fas fa-user-plus"></i> <?php echo lang('component.Register'); ?></button>

</div>
<div class="divscrollbar " style="overflow-x:auto;">
            <table id="tablelist" class="table table-striped table-bordered" style="width:100%">
                <thead class="table-dark text-white font-weight-bold">
                    <tr>
                        <th style="width:3%;"><?php echo lang('component.STT'); ?></th>
                        <th><?php echo lang('component.Name'); ?></th>
                        <th ><?php echo lang('component.Employeeid'); ?></th>
                        <th><?php echo lang('component.Course/Event name'); ?></th>
                        <th><?php echo lang('component.Startdate'); ?></th>
                        <th><?php echo lang('component.Enddate'); ?></th>
                        <th><?php echo lang('component.Weekdays'); ?></th>
                        <th ><?php echo lang('component.Time'); ?></th>
                        <th><?php echo lang('component.Note'); ?></th>
                        <th style="width: 5%;"><?php echo lang('component.Action'); ?></th>
                    </tr>
                </thead>

                <tbody >
                </tbody>

            </table>
            </div>
        </div>

    </div>
</div>
</div>



<!-- model register -->
<div class="modal modelregister" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">add Employee</h5>
                <button type="button" class="closeregister" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-4">
                    <span style="width:150px;">Employee id</span>
                    <div id="input">
                        <input id="employeeid" type="text" name="employeeid" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" />
                    </div>
                </div>
                <p class="text-danger errorregister"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmregisteradd" class="btn btn-primary">ADD</button>
                <button type="button" id="confirmregistercancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<!-- confirm delete -->
<div class="modal modaldelete" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirmyes" class="btn btn-primary">Yes</button>
                <button type="button" id="confirmnone" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>


<?= $this->section('style') ?>



<?= $this->endSection() ?>

<?= $this->section('script') ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.0/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<style>
    .divscrollbar::-webkit-scrollbar { 
  width: 0 !important;
  display: none; 
}
</style>

<script>
    function createManageBtn(id) {
        return '<div class="d-flex justify-content-center"><a  onclick=" return checkdelete(' + id + ');"><button class="btn btn-danger btndelete"  onclick=" return false"><i class="fa fa-trash"></i></button></a></div>';

    }
    $(document).ready(function() {
        $('div.toolbar').html('<h1>text</h1>')
        $('#tablelist').DataTable({

            lengthMenu: [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ], // page length options
            bProcessing: true,
            searching: false,
            processing: true,
            serverSide: true,
            "order": [
                1, "asc"
            ],
            ajax: {
                "url": "<?php echo base_url('course/paticipantlist/' . $id) ?>",
                "type": "get",



            },

            columnDefs: [{
                "render": createManageBtn,
                "data": null,
                "targets": [9]
            }],
            columns: [{
                    data: "row"
                },
                {
                    data: "name"
                },
                {
                    data: "employeeid"
                },
                {
                    data: "coursename"
                },
                {
                    data: "start_date"
                },
                {
                    data: "end_date"
                },
                {
                    data: "weekdays"
                },
                {
                    data: "time"
                },
                {
                    data: "note"
                },
                {
                    data: "id"
                },
            ],


            dom: '<"row"<"col-6"l><"col-6 d-flex justify-content-end"B>><tr><"row"<"col-6"i><"col-6 d-flex justify-content-end"p>>',
            "bFilter": false,
            // buttons: [
            //     {
            //         text: '<i class="fas fa-user-plus"></i> <?php echo lang('component.Register'); ?>',
            //         attr: {
            //             class: "btn btn-primary"
            //         },
            //         action: function(e, dt, node, config) {
            //             register();
            //         }

            //     }


            // ],

            "language": {
                "url":  " <?php echo lang('component.languagedatatable'); ?>"
            }


        });
        

        

    });

    

    function register() {
        $(".modelregister").css('display', 'block');


        $("#confirmregisteradd").on("click", function() {

            if ($('#employeeid').val() != '') {

                $.ajax({
                    url: '<?= base_url('course/addpaticipant/' . $id) ?>',
                    type: 'get',
                    data: {

                        'employeeid': $('#employeeid').val()

                    },
                    success: function(data) {
                            $(".modelregister").css('display', 'none');
                            location.reload();

                        


                    }
                });
            } else {
                $('.errorregister').text('Bạn chưa nhập employee id')
            }



        });

        $("#confirmregistercancel").on("click", function() {

            $(".modelregister").css('display', 'none');
            return false;
        });
        $(".closeregister").on("click", function() {

            $(".modal").css('display', 'none');
            return false;
        });
    }

    function checkdelete(id) {
        $(".modaldelete").css('display', 'block');


        $("#confirmyes").on("click", function() {

            $(".modaldelete").css('display', 'none');
            $.ajax({
                url: '<?= base_url('course/deletepaticipant/') ?>/id=' + id,
                type: 'get',
                success: function(data) {
                    if (data = true) {
                        location.reload();
                        return true;
                    }

                }
            });



        });

        $("#confirmnone").on("click", function() {

            $(".modaldelete").css('display', 'none');
            return false;
        });
        $(".close").on("click", function() {

            $(".modaldelete").css('display', 'none');
            return false;
        });
    }
</script>
<?= $this->endSection() ?>