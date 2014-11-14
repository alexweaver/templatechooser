var placeholder_html = '<li class="pho"><div class="ph"><div class="phi">Your Element Here</div></div></li>';
var drag_ph = placeholder_html.replace("pho", "pho dph");
var sort_ph = placeholder_html.replace("pho", "pho sph");
$(function() {
	$(".draggable").draggable({
		zIndex: 100,
		scroll: false,
		start: function() {
			$(this).addClass("active-draggable");
		},
		stop: function(){
			$(this).removeClass("active-draggable");
			$("li.dph").remove();
		},
		drag: function() {
			if ($("#mylist").data("over"))
			{
				var index = getIndex($(this));
				if (index !== $(this).data("index"))
				{
					$("li.pho").remove();
					insertAtIndex(getPH(), index);
					$(this).data("index", index);
				}
			}
		},
		revert: true,
		revertDuration: 0
	});
	$("#droppable").droppable({
		accept: function(el) {
        	return el.hasClass('draggable');
    	},
		over: function(ev, ui)
		{
			$("#mylist").data("over", true);
		},
		out: function(ev, ui)
		{
			$("#mylist").data("over", false);
			
			$("li.dph").remove();
			ui.draggable.removeData("index");
		},
		deactivate: function (ev, ui)
		{
			$("#mylist").data("over", false);
			$("li.dph").remove();
			ui.draggable.removeData("index");
		},
		drop: function(ev, ui)
		{
			e = $("<li><div class='d'>" + ui.draggable.html() + "</div></li>");
			added = false;
			var sortable = $("#mylist");
			sortable.children('li:not(.ui-sortable-helper, .sph, .pho, .dph)').each(function() {
				var top = top || ui.draggable.offset().top - ui.draggable.height() / 2;
				if (top < $(this).offset().top - $(this).height() / 2)
				{
					added = true;
					e.insertBefore(($(this)));
					return false;
				}
			});
			if (!added)
			{
				if($(sortable).children('li'))
				{
					$(sortable).append(e);
					return false;
				}
			}
		}
	});
	function insertAtIndex(e, index)
	{
		e.insertBefore($("#mylist").children('li')[index]);
		if (index >= $("#mylist").children('li').length) {
			$("#mylist").append(e);
		}
	}
	function getIndex(e)
	{
		if ($("#mylist").data("over"))
		{
			var return_value = 0;
			var sortable = $("#mylist");
			var added = false;
			sortable.children('li:not(.pho sph dph)').each(function() {
				var top = top || e.offset().top - e.height() / 2;
				if (top < $(this).offset().top - $(this).height() / 2)
				{
					return_value = $(this).index();
					added = true;
					return false;
				}
			});
			if (!added && sortable.children('li:not(.ph)').length !== 0)
			{
				return_value = sortable.children('li:not(.ph)').length;
			}
			return return_value;
		}
	}
	var i = 0;
	function getPH() 
	{
		var p = drag_ph;
		var ph = $(p);
		ph.droppable({
			out: function(ev, ui)
			{
				$(this).remove();
			},
			over: function(ev, ui)
			{
				$(this).css('background-color', 'green');
			}
		})
		return ph;
	}

	$("#mylist").sortable({
		start: function(e, ui) {
			ui.placeholder.html(sort_ph);
		},
		placeholder: "empty"
	});
});