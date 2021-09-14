$(document).ready(function(){
	$('.dropdown-trigger').dropdown();
	$('.sidenav').sidenav();
	$('.collapsible').collapsible();
	$('#dataTable').DataTable({
	    scrollX: true,
	    lengthChange: false,
	});
	$('.modal').modal();
	$('select').formSelect();

	$('.datepicker').datepicker();
});
