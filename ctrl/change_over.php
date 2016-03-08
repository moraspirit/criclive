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
            <h4 class="modal-title" id="myModalLabel">Change Over | Bowler</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <form id="bowler_form" class="form-horizontal" onsubmit="validateChangeOverForm(this);
                        return false;" action="db/save_bowler.php" method="POST">

                    <?php
                    if ($status == '1') {
                        ?>
                        <div class="form-group">
                            <div id="divbowler" class="col-sm-12">
                                <select id="bowler" name="bowler" class="form-control">
                                    <option value="select" selected="" disabled=""> --- Select Bowler ---</option>
                                    <?php
                                    $res_bowler = mysqli_query($con, "SELECT bowler FROM bowler WHERE matchid='$id' AND inning='$inning1' AND status='1'");
                                    $last_bowler = '';
                                    if ($row = mysqli_fetch_array($res_bowler)) {
                                        $last_bowler = $row['bowler'];
                                    }
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning2' ORDER BY id DESC");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $player = $row['player'];
                                        $jersey = $row['jersey'];
                                        if ($player != '') {
                                            if ($player == $last_bowler) {
                                                ?>
                                                <option value="<?php echo $player . '#' . $jersey ?>" disabled="" style="background-color: #e3e3e3;"><?php echo $jersey . ' | ' . $player; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $player . '#' . $jersey ?>"><?php echo $jersey . ' | ' . $player; ?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                <span id="spanbowler" class="" aria-hidden="true"></span>
                            </div>
                        </div>
                        <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                        <input type="hidden" name="inning" value="<?php echo $inning1; ?>">
                        <?php
                    } else if ($status == '2') {
                        ?>
                        <div class="form-group">
                            <div id="divbowler" class="col-sm-12">
                                <select id="bowler" name="bowler" class="form-control">
                                    <option value="select" selected="" disabled=""> --- Select Bowler ---</option>
                                    <?php
                                    $res_bowler = mysqli_query($con, "SELECT bowler FROM bowler WHERE matchid='$id' AND inning='$inning2' AND status='1'");
                                    $last_bowler = '';
                                    if ($row = mysqli_fetch_array($res_bowler)) {
                                        $last_bowler = $row['bowler'];
                                    }
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning1' ORDER BY id DESC");
                                    while ($row = mysqli_fetch_array($res)) {
                                        $player = $row['player'];
                                        $jersey = $row['jersey'];
                                        if ($player != '') {
                                            if ($player == $last_bowler) {
                                                ?>
                                                <option value="<?php echo $player . '#' . $jersey ?>" disabled="" style="background-color: #e3e3e3;"><?php echo $jersey . ' | ' . $player; ?></option>
                                                <?php
                                            } else {
                                                ?>
                                                <option value="<?php echo $player . '#' . $jersey ?>"><?php echo $jersey . ' | ' . $player; ?></option>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                <span id="spanbowler" class="" aria-hidden="true"></span>
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