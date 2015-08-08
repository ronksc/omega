<div id="map"></div>
<?
	$marker_content = preg_replace( "/\r|\n/", "", apply_filters('the_content', $post->post_content) );
?>
<script>
	var map;
	var brooklyn_marker = {id:1, marker_x:<?=get_field('google_map_x', $post->ID)?>, marker_y:<?=get_field('google_map_y', $post->ID)?>, marker_content:'<?=$marker_content?>'};
</script>

