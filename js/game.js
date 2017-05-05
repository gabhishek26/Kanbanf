 $(document).ready(function(){	

  $('#myTask').draggable({
     revert: 'invalid'
	 });
  $('#myWorker').droppable({
     drop: handleDropEvent
	 });

	
 }); 
 
  function myMove() {
	  	$('#myTask').fadeIn(3000);
	  var elem=document.getElementById("myTask");
	var pos=0;
	var id=setInterval(frame,5);
	function frame() {
		if (pos==100){
		   clearInterval(id);
		} else {
		   pos++;
		   elem.style.left=pos+'px'
		}
	}
  }
  
  function handleDropEvent(event,ui){
	var draggable=ui.draggable;
	var offset=$('#myWorker').offset();
	var top = parseInt($(ui.draggable).css('top'))-offset.top+80;
	var left=parseInt($(ui.draggable).css('left'))-offset.left-30;
	alert('I\'ll handle the task, boss!');
	$(ui.draggable).appendTo('#myWorker');
	$(ui.draggable).css({'left':left,'top':-top});
	$('#myTask').draggable( "disable" );
	$('#myTask').fadeOut(3000);
	setTimeout("myMove()",3000);
	
}
 

