<?php $total_row = count( $options_wp_samurai_dashboard['gmap_iconizer_dashboard'],1);
for ($i = 0; $i <= 0; $i++):
?>
<a href="<?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"link"}; ?>" target="_blank"><?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"title"}; ?> </a>
</br>"<?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"author"}->{"first_name"}; ?> <?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"author"}->{"last_name"}; ?>" - <?php $s = $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"date"}; $date = strtotime($s); echo date('F d, Y', $date);?>
<p><?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"content"}; ?></p>
<?php endfor; ?>
<?php $total_row = count( $options_wp_samurai_dashboard['gmap_iconizer_dashboard'],1);
for ($i = 1; $i <= $total_row-1; $i++):
?>
<p><a href="<?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"link"}; ?>" target="_blank"><?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"title"}; ?> </a>
</br>"<?php echo $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"author"}->{"name"}; ?>" - <?php $s = $options_wp_samurai_dashboard['gmap_iconizer_dashboard'][$i]->{"date"}; $date = strtotime($s); echo date('F d, Y', $date);?></p>
<?php endfor; ?>