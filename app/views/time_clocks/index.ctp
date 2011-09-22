<?php 
    $date_today = date('Y-m-d');
    $time_now = date('h:i A');
    if(!empty($timeclock)){
        $in_date = date('Y-m-d', strtotime($timeclock['TimeClock']['in']));
        $in_time = date('h:i A', strtotime($timeclock['TimeClock']['in']));
    }
?>
<div class="span16">
    <div class="row">
        <div class="span12 columns">
            
            <?php if(empty($timeclock)):?>
                <?php echo $this->Form->create('TimeClock', array('action' => 'in'));?>
                <div class="row">
                    <span class="span6"><h4>You are not clocked in.</h4></span>
                </div>
                <fieldset>
                <legend></legend>
                <div class="clearfix">
                <?php 
                    echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['id']));
                    echo $this->Form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
                ?>
                </div>
                <div class="actions">
         		    <?php echo $form->end(array('div'=>false, 'label'=>__('Clock In',true),'name'=>'ClockIn', 'class'=>'btn large primary'));?>
         		</div>
                
                </fieldset>
            <?php else:?>
            <?php echo $this->Form->create('TimeClock', array('action' => 'out'));?>
            <div class="row">
                <div class="span2" title="In time">
                    <div class="mb5">
                        <?php 
                            if($date_today === $in_date){
                                echo __('Today at ', true);
                            }else{
                                echo $in_date;
                            }
                        ?>
                    </div>
                    <div class="bold font20">
                        <?php
                            echo $in_time;
                        ?>
                    </div>
                </div>
            </div>
                <fieldset>
                
                    <legend>
                        
                    </legend>
                    <div class="clearfix">
                    
                    
                    <?php
                    
                        
                        echo $this->Form->input('user_id', array('type' => 'hidden', 'value' => $user['id']));
                        echo $this->Form->input('organization_id', array('type' => 'hidden', 'value' => $organization['id']));
                        
                        if(!empty($reasons)){
                            $reason_keys = array_keys($reasons);
                            echo '<label for="TimeClockReasonCodeId">' . __('Reason Code', true). '</label>';
                            echo '<div class="input">';
                            echo $this->Form->select('reason_code_id', $reasons, array('label'=>false, 'div'=>false));
                            echo '</div>';
                        }
                    ?>
                    </div>
                    <div class="actions">
             		    <?php echo $form->end(array('div'=>false, 'label'=>__('Clock Out',true),'name'=>'ClockOut', 'class'=>'btn large primary'));?>
             		</div>
                    
                </fieldset>
            <?php endif;?>
            
        </div>

        <?php if(!empty($timeclocks)):?>
            <div id="time_sheet" class="span12 columns">
                <h3><?php echo __('Time Sheet', true);?></h3>
                <table class="zebra-striped">
                    <thead class="ddd">
                        <th><?php echo __('In', true);?></th>
                        <th><?php echo __('Out', true);?></th>
                        <th><?php echo __('Duration', true);?></th>
                        <th><?php echo __('Out Reason', true);?></th>
                    </thead>
                    <tbody>
                    <?php 
                        $days_total = null;
                        $hours_total = null;
                        $minutes_total = null;
                        $days_left = null;
                        $hours_left = null;
                        $minutes_left = null;
                    ?>
                    <?php foreach($timeclocks as $index => $value):?>
                        <?php if($value['TimeClock']['out'] != '0000-00-00 00:00:00'):?>
                            <?php 
                                $date_in = date('Y-m-d', strtotime($value['TimeClock']['in']));
                                $time_in = date('h:i A', strtotime($value['TimeClock']['in']));
                                $date_out = date('Y-m-d', strtotime($value['TimeClock']['out']));
                                $time_out = date('h:i A', strtotime($value['TimeClock']['out']));
                                $timezone = $this->Session->read('Auth.User.timezone');
                                if(empty($timezone)){
                                    if(!empty($this->currentOrganization['timezone'])){
                                        $timezone = $this->currentOrganization['timezone'];
                                    }else{
                                        $timezone = date_default_timezone_get();
                                    }
                                    
                                }
                                list($days_diff, $hours_diff, $minutes_diff) = 
                                    $this->Date->dateDiff($value['TimeClock']['in'], $value['TimeClock']['out'], $timezone);
                                    
                                if($days_diff <= 9){
                                    $days_diff =  $days_diff;
                                }
                                if($hours_diff <= 9){
                                    $hours_diff = '0' . $hours_diff;
                                }
                                if($minutes_diff <= 9){
                                    $minutes_diff = '0' . $minutes_diff;
                                }
                                $days_left += (int)$days_diff;
                                $hours_left += (int)$hours_diff;
                                $minutes_left += (int)$minutes_diff;
                                
                            ?>
                            <tr class="<?php echo $approved = ($value['TimeClock']['approved'])? 'approved' : 'unapproved'; ?>">
                                <td title="<?php echo $date_in;?>"><?php echo $time_in;?></td>
                                <td title="<?php echo $date_out;?>"><?php echo $time_out;?></td>
                                <td title="<?php echo $days_diff;?> days"><?php echo (($days_diff > 0)?(($days_diff == 1)?'1 day, ':$days_diff.' days, '):'0 days, ') . $hours_diff.' hours, '.$minutes_diff.' minutes';?></td>
                                <td>
                                    <?php if(!empty($reasons)):?>
                                        <?php 
                                            if(array_key_exists($value['TimeClock']['reason_code_id'], $reasons)) {
                                                echo $reasons[$value['TimeClock']['reason_code_id']];
                                            }
                                        ?>
                                    <?php endif;?>
                                </td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>
                        <?php 
                            $minutes_total = round($minutes_left % 60); 
                            $hours_left = ($minutes_left / 60) + $hours_left;
                            $hours_total = round($hours_left % 24);
                            $days_total = round($days_left + ($hours_left / 24));
                        ?>
                        <tr><td colspan="5"><h4><?php echo (($days_total > 0)?(($days_total == 1)?'1 day, ':$days_total.' days, '):'0 days, ') . $hours_total . ' hours, ' . $minutes_total . ' minutes';?></h4></td></tr> 
                    </tbody>
                    </table>
            </div>
        <?php endif;?>        
    </div>
</div>

