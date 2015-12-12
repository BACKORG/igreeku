<?php
foreach ($chapters as $chapter) {
?>
    <option value="<?=$chapter->id?>">
        <?=$chapter->name?>
        (<?=($chapter->type == 1)? 'Fraternities' : 'Sororities'; ?>)
    </option>
<?php    
}
?>