<div class="timeClocks index">
<h2><?php __('TimeClock');?></h2>
    <div id="current_timeclock">
        
        <?php if(empty($timeclock)):?>
            <span id="timeclock_message">You are not clocked in.</span>
            <?php
            
                echo $this->Form->create('TimeClock', array('action' => 'in'));
                echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['id']));
                echo $this->Form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
                echo $this->Form->end('Clock In', array('type' => 'button'));
            ?>
        <?php else:?>
            <span id="timeclock_message">You clocked in at <time class="dtstart" datetime="<?php echo $timeclock['TimeClock']['in'];?>"><?php echo $timeclock['TimeClock']['in'];?></time>.</span>
            <?php
            
                echo $this->Form->create('TimeClock', array('action' => 'out'));
                echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['id']));
                echo $this->Form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
                
                if(!empty($reasons)){
                    echo $this->Form->select('reason_code_id', $reasons, null, array());
                }
                echo $this->Form->end('Clock Out', array('type' => 'button'));
            ?>
        <?php endif;?>
        
    </div>
    <div id="current_timeclocks">
    <style>
        #date {
            font-weight:bold;
            margin:5px;
        }
        #timeclock {
            padding:5px 0px 5px 5px;
        }
        #time_total {
            margin-top:5px;
            margin-bottom:5px;
            font-weight:bold;
            background-color:#aaa;
            padding:5px 0px 5px 5px;
        }
        #timeclock:nth-child(even).approved {
            background-color:#fff;
            background-image:url(/img/timesheet_green_stripes.png);
        }
        
        #timeclock:nth-child(even).unapproved {
            background-color:#fff;
            background-image:url(/img/timesheet_red_stripes.png);
        }
        #timeclock:nth-child(odd) {
            background-color:#ccc;
        }
        #time_sheet #timeclocks {
            border-bottom:2px solid #000;
        }
        #timeclock span {
            padding-right:30px;
        }
        #timedate_total {
            padding:5px 0px 5px 350px;
            display:block;
            background-color:#ddd;
        }
    </style>
        <?php if(!empty($timeclocks)):?>
            <span id="timeclocks_message">This Pay Period</span>
            <div id="time_sheet">
            <?php 
                $lastDate = null;
                $timeTotal = null;
                $timeDateTotal = null;
                $sameDate = false;
                foreach($timeclocks as $index => $value) {
                    if($value['TimeClock']['out'] != '0000-00-00 00:00:00') {
                        $datetime = explode(' ', $value['TimeClock']['in']);
                        $dateIn = $datetime[0];
                        $timeIn = $datetime[1];
                        unset($datetime);
                        
                        $datetime = explode(' ', $value['TimeClock']['out']);
                        $dateOut = $datetime[0];
                        $timeOut = $datetime[1];
                        unset($datetime);
                        
                        $datetimeIn = new DateTime($value['TimeClock']['in']);
                        $datetimeOut = new DateTime($value['TimeClock']['out']);
                        $datetimeDiff = $datetimeIn->diff($datetimeOut);
                        
                        if($lastDate != $dateIn) {
                            $lastDate = $dateIn;
                            
                            $timeDateTotal = new DateTime('1970-01-01 00:00:00');
                            if($sameDate){
                                echo "</div>";
                            }
                            echo "<div id=\"timeclocks\"><div id=\"date\">" . $dateIn ."</div>";
                        }
                        $sameDate = true;
                        if(is_null($timeTotal)){
                        
                            $timeTotal = new DateTime('1970-01-01 00:00:00');
                        }
                        $timeDateTotal->add($datetimeDiff);
                        $timeTotal->add($datetimeDiff);
                ?>
                
                    <div id="timeclock" class="<?php echo $approved = ($value['TimeClock']['approved'])? 'approved' : 'unapproved'; ?>">
                        
                        <span id="time_in" title="clocked in">
                            <?php echo $timeIn;?>
                        </span>
                        <span id="time_out" title="clocked out">
                            <?php echo $timeOut;?>
                        </span>
                        <span id="time_length" title="amount">
                            <?php echo $datetimeDiff->format('%H:%I:%S');// %H:%i:%s ??? ?> 
                        </span>
                        <?php if(!empty($reasons)):?>
                            <span id="time_out_reason">
                                <?php 
                                    if(array_key_exists($value['TimeClock']['reason_code_id'], $reasons)) {
                                        echo $reasons[$value['TimeClock']['reason_code_id']];
                                    }
                                ?>
                            </span>
                        <?php endif;?>
                    </div>
                    
                        <?php 
                            if($sameDate){
                            ?>
                                <span id="timedate_total" title="total today"><?php echo $timeDateTotal->format('H:i:s')?></span>
                            <?php
                            }
                        } //endif
                    } //endforeach
                    if(!is_null($timeTotal)){
                        if($sameDate){
                            echo "</div>";
                            $sameDate=false;
                        }
                        
                        $d = ($timeTotal->format('d') - 1) * 24;
                        $h = $timeTotal->format('H');
                        $t = $d + $h;
                        $m = $timeTotal->format('i');
                    
                        echo "<div id=\"time_total\">" . $t . ' Hours, ' . $m .  " Minutes Total</div>";
                    }
                ?>
            </div>
        <?php endif;?>        
    </div>
</div>

