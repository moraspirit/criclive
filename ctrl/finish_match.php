<?php
include '../DBCon.php';
$id = $_POST['id'];
$status = $_POST['status'];
$inning1 = $_POST['inning1'];
$inning2 = $_POST['inning2'];
?>
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Finish Match</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <form id="finish_form" class="form-horizontal" action="db/save_finish.php" method="POST">

                    <input type="hidden" name="matchid" value="<?php echo $id; ?>"/>

                    <div class="col-sm-12">
                        <h4 class="text-justify">Do you want to finish the match ?</h4>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-5">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-danger center-block">YES</button>
                        </div>
                        <div class="col-sm-4">
                            <button type="button" class="btn btn-success center-block" data-dismiss="modal">NO</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>