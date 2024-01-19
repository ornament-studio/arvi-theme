<p class="booking-time_slots_title">Available time</p>
<div class="time_slots">
    <?php 
    foreach ($args['time_slots'] as $key => $time_slot) { ?>
        <div class="time_slot">
            <input 
                type="radio" 
                name="time_slot" 
                id="time_slot-radio_<?=$key?>"
                value="<?=$time_slot['value']?>" 
                class="time_slot-radio time_slot-radio_<?=$key?>"
                data-price="<?=$time_slot['price']?>"
            >
            <label class="time_slot-label" for="time_slot-radio_<?=$key?>"><?=$time_slot['text']?></label>
        </div>
    <?php } ?>
</div>