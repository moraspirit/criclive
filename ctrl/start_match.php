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
            <h4 class="modal-title" id="myModalLabel">Opening Batsmans</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <form id="batsman_open_form" class="form-horizontal" onsubmit="validateBatsmanOpenForm(this);
                        return false;" action="db/save_open_batsman.php" method="POST">

                    <?php
                    if ($status == '0') {
                        ?>
                        <div class="form-group">
                            <div id="divbatsman1" class="col-sm-12">
                                <!--<span class="label label-info"><span class="glyphicon glyphicon-" aria-hidden="true"></span></span>-->
                                <select id="batsman1" name="batsman1" class="form-control">
                                    <option value="select" selected="" disabled=""> Select No. 1 Batsman</option>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning1'");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $player = $row['player'];
                                        $jersey = $row['jersey'];
                                        if ($player != '') {
                                            ?>
                                            <option value="<?php echo $player . '#' . $jersey ?>"><?php echo $jersey . ' | ' . $player; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span id="spanbatsman1" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="divbatsman2" class="col-sm-12">
                                <select id="batsman2" name="batsman2" class="form-control">
                                    <option value="select" selected="" disabled=""> Select No. 2 Batsman</option>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning1'");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $player = $row['player'];
                                        $jersey = $row['jersey'];
                                        if ($player != '') {
                                            ?>
                                            <option value="<?php echo $player . '#' . $jersey ?>"><?php echo $jersey . ' | ' . $player; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span id="spanbatsman2" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                        <input type="hidden" name="inning" value="<?php echo $inning1; ?>">
                        <?php
                    } else if ($status == '*' || $status == '1') {
                        ?>
                        <div class="form-group">
                            <div id="divbatsman1" class="col-sm-12">
                                <select id="batsman1" name="batsman1" class="form-control">
                                    <option value="select" selected="" disabled=""> Select No. 1 Batsman</option>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning2'");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $player = $row['player'];
                                        $jersey = $row['jersey'];
                                        if ($player != '') {
                                            ?>
                                            <option value="<?php echo $player . '#' . $jersey ?>"><?php echo $jersey . ' | ' . $player; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span id="spanbatsman1" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="divbatsman2" class="col-sm-12">
                                <select id="batsman2" name="batsman2" class="form-control">
                                    <option value="select" selected="" disabled=""> Select No. 2 Batsman</option>
                                    <?php
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning2'");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $player = $row['player'];
                                        $jersey = $row['jersey'];
                                        if ($player != '') {
                                            ?>
                                            <option value="<?php echo $player . '#' . $jersey ?>"><?php echo $jersey . ' | ' . $player; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <span id="spanbatsman2" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                        <input type="hidden" name="inning" value="<?php echo $inning2; ?>">
                    <?php } ?>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary center-block">Register</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>