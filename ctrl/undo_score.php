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
            <h4 class="modal-title" id="myModalLabel">Undo Score</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <form id="score_undo_form" class="form-horizontal" action="db/save_undo.php" method="POST">

                    <?php if ($status == '1') { ?>
                        <?php
                        $res_batsman = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning1' AND status='1'");
                        if ($row = mysqli_fetch_array($res_batsman)) {
                            $batsman = $row['batsman'];
                            $batsman_score = $row['score'];
                        }

                        $res_extra = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning1' AND batsman='Extra'");
                        if ($row = mysqli_fetch_array($res_extra)) {
                            $extra = $row['score'];
                        }

                        $res_bowler = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning1' AND status='1'");
                        if ($row = mysqli_fetch_array($res_bowler)) {
                            $bowler = $row['bowler'];
                            $bowler_score = $row['score'];
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <strong>Batsman Score : <text class="text-primary"><?php echo $batsman; ?></text></strong>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="batsmanScore" value="<?php echo $batsman_score; ?>" class="form-control center-block">
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <strong>Extra Score</strong>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="extraScore" value="<?php echo $extra; ?>" class="form-control center-block">
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <strong>Bowler Score : <text class="text-primary"><?php echo $bowler; ?></text></strong>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="bowlerScore" value="<?php echo $bowler_score; ?>" class="form-control center-block">
                            </div>
                        </div>
                        <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                        <input type="hidden" name="inning" value="<?php echo $inning1; ?>">
                    <?php } else if ($status == '2') { ?>
                        <?php
                        $res_batsman = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning2' AND status='1'");
                        if ($row = mysqli_fetch_array($res_batsman)) {
                            $batsman = $row['batsman'];
                            $batsman_score = $row['score'];
                        }

                        $res_extra = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning2' AND batsman='Extra'");
                        if ($row = mysqli_fetch_array($res_extra)) {
                            $extra = $row['score'];
                        }

                        $res_bowler = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning2' AND status='1'");
                        if ($row = mysqli_fetch_array($res_bowler)) {
                            $bowler = $row['bowler'];
                            $bowler_score = $row['score'];
                        }
                        ?>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <strong>Batsman Score : <text class="text-primary"><?php echo $batsman; ?></text></strong>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="batsmanScore" value="<?php echo $batsman_score; ?>" class="form-control center-block">
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <strong>Extra Score</strong>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="extraScore" value="<?php echo $extra; ?>" class="form-control center-block">
                                <hr>
                            </div>
                            <div class="col-sm-12">
                                <strong>Bowler Score : <text class="text-primary"><?php echo $bowler; ?></text></strong>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name="bowlerScore" value="<?php echo $bowler_score; ?>" class="form-control center-block">
                            </div>
                        </div>
                        <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                        <input type="hidden" name="inning" value="<?php echo $inning2; ?>">
                    <?php } ?>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="col-sm-12 btn btn-primary center-block">Update</button>
                        </div>
                    </div>

                </form>

                <hr>

                <form id="target_change_form" class="form-horizontal" action="db/save_target.php" method="POST">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <h4 class="text-primary text-center"><strong>Target Change</strong></h4>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4 text-center">
                                <strong>Score</strong>
                            </div>
                            <div class="col-sm-4 text-center">
                                <strong>Overs</strong>
                            </div>
                            <div class="col-sm-4">
                                <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="col-sm-4 text-center">
                                <input type="text" name="score" class="form-control center-block">
                            </div>
                            <div class="col-sm-4 text-center">
                                <input type="text" name="over" class="form-control center-block">
                            </div>
                            <div class="col-sm-4 text-center">
                                <button type="submit" class="btn btn-danger center-block">Change</button>
                            </div>
                        </div>
                    </div>
                </form>

                <hr>

                <form id="over_cancel_form" class="form-horizontal" action="db/cancel_over.php" method="POST">
                    <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                    <?php if ($status == '1') { ?>
                        <input type="hidden" name="inning" value="<?php echo $inning1; ?>">
                    <?php } else if ($status == '2') { ?>
                        <input type="hidden" name="inning" value="<?php echo $inning2; ?>">
                    <?php } ?>
                    <div class="col-sm-12">
                        <h4 class="text-primary text-center"><strong>Cancel Current Over</strong></h4>
                        <p><span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> This is to be used whenever just after an over starts.</p>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="col-sm-12 btn btn-danger center-block">Cancel Over</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>