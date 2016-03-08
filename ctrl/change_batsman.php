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
            <?php
            if ($status == '1') {
                $result = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning1' AND status='1'");
            } else if ($status == '2') {
                $result = mysqli_query($con, "SELECT * FROM batsman WHERE matchid='$id' AND inning='$inning2' AND status='1'");
            }
            $batsman = '';
            if ($row = mysqli_fetch_array($result)) {
                $batsman = $row['batsman'];
            }
            ?>
            <h4 class="modal-title" id="myModalLabel"><span class="label label-danger">Wicket</span> <?php echo $batsman; ?></h4>
        </div>
        <div class="modal-body">
            <div class="form-group">

                <form id="wicket_form" class="form-horizontal" onsubmit="validateWicketForm(this);
                        return false;" action="db/save_wicket.php" method="POST">

                    <div class="form-group">
                        <div id="divhowout" class="col-sm-12">
                            <select id="howout" name="howout" class="form-control" onchange="loadCatchBlock();">
                                <option value="select" selected="" disabled=""> --- How Out ---</option>
                                <option value="wicket">Wicket</option>
                                <option value="catch">Catch</option>
                                <option value="runout">Run Out</option>
                                <option value="lbw">LBW</option>
                                <option value="runoutextra" class="bg-danger">Run Out Extra</option>
                            </select>
                            <span id="spanhowout" class="" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div id="catchblock" class="form-group hidden">
                        <div id="divcatch" class="col-sm-12">
                            <select id="catch" name="catch" class="form-control">
                                <option value="select" selected="" disabled=""> --- Catch by ---</option>
                                <?php
                                if ($status == '1') {
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning2'");
                                } else if ($status == '2') {
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning1'");
                                }
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
                            <span id="spancatch" class="" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <?php
                            if ($status == '1') {
                                $result = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning1' AND status='1'");
                            } else if ($status == '2') {
                                $result = mysqli_query($con, "SELECT * FROM bowler WHERE matchid='$id' AND inning='$inning2' AND status='1'");
                            }
                            $bowler = '';
                            $jersey = '';
                            if ($row = mysqli_fetch_array($result)) {
                                $bowler = $row['bowler'];
                                $jersey = $row['jersey'];
                            }
                            ?>
                            <p><strong> Bowler : </strong><?php echo $bowler; ?></p>
                            <input type="hidden" name="bowler" value="<?php echo $bowler . '#' . $jersey ?>">
                            <hr>
                        </div>

                    </div>

                    <div class="form-group">
                        <div id="divbatsman" class="col-sm-12">
                            <select id="batsman" name="batsman" class="form-control">
                                <option value="select" selected="" disabled=""> --- New Batsman ---</option>
                                <?php
//                                $flag = TRUE;
                                if ($status == '1') {
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning1'");
                                } else if ($status == '2') {
                                    $res = mysqli_query($con, "SELECT * FROM player WHERE matchid='$id' AND team='$inning2'");
                                }
                                while ($row = mysqli_fetch_array($res)) {
                                    $player = $row['player'];
                                    $jersey = $row['jersey'];
                                    if ($player != '') {
                                        if ($status == '1') {
                                            $played_batsmans = mysqli_query($con, "SELECT batsman FROM batsman WHERE matchid='$id' AND inning='$inning1'");
                                        } else if ($status == '2') {
                                            $played_batsmans = mysqli_query($con, "SELECT batsman FROM batsman WHERE matchid='$id' AND inning='$inning2'");
                                        }
                                        $bool = TRUE;
                                        while ($row = mysqli_fetch_array($played_batsmans)) {
                                            $cur_batsman = $row['batsman'];
                                            if ($player == $cur_batsman) {
                                                $bool = FALSE;
                                            }
                                        }
                                        if ($bool) {
//                                            $flag = FALSE;
                                            ?>
                                            <option value="<?php echo $player . '#' . $jersey ?>"><?php echo $jersey . ' | ' . $player; ?></option>
                                            <?php
                                        } else {
                                            ?> 
                                            <option value="<?php echo $player . '#' . $jersey ?>" disabled="" style="background-color: #e3e3e3;"><?php echo $jersey . ' | ' . $player; ?></option>
                                            <?php
                                        }
                                    }
                                }
                                if ($status == '1') {
                                    ?> 
                                    <option value="end1">- End of the Match -</option>
                                    <?php
                                }else if ($status == '2') {
                                    ?> 
                                    <option value="end2">- End of the Match -</option>
                                    <?php
                                }
                                ?>
                            </select>
                            <span id="spanbatsman" class="" aria-hidden="true"></span>
                        </div>
                    </div>
                    <input type="hidden" name="matchid" value="<?php echo $id; ?>">
                    <?php if ($status == '1') { ?>
                        <input type="hidden" name="inning" value="<?php echo $inning1; ?>">
                    <?php } else if ($status == '2') { ?>
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