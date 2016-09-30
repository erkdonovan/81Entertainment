
<script type="text/javascript">
	function loadNowPlaying(){
  $("#clients").load("clients");
}
setInterval(function(){loadNowPlaying()}, 5000);
loadNowPlaying();
