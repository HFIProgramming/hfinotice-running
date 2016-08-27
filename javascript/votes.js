/**Votes js*/

$(document).ready(function() {
	
	$("#vote_form").submit(function(e){
		var option = $("#option_choice").val();
		if (option == ""){
			e.preventDefault();
			alert("You should vote first. 你必须进行投票。");
		}
	});
	
	$("#multi_form").submit(function(e){
		var option1 = $("#option_choice_1").val();
		var option2 = $("#option_choice_2").val();
		if (option1 == "" || option2 == ""){
			e.preventDefault();
			alert("You should choose two options. 你必须投2票。");
		}
	});
	
});

function open_vote(id) {
	var vote_id = id.substring(9);
	location.href = "http://hfinotice.sinaapp.com/votes/detail/"+vote_id;
}

function do_vote(id) {
	var option_id = id.substring(10);
	$("#option_choice").val(option_id);
}

function do_2_vote(id){
	var all_options = $("#vote_options").find('.regular-checkbox');
	var checked = 0;
	all_options.each(function(){
			var thisid = $(this).attr("id");
			if (document.getElementById(thisid).checked)
				checked ++;
		});
	if (checked < 2){
		$("#option_choice_1").val("");
		$("#option_choice_2").val("");
	}
	if (checked == 2){
		all_options.each(function(){
			var thisid = $(this).attr("id");
			if (document.getElementById(thisid).checked){
				if ($("#option_choice_1").val() == "")
					$("#option_choice_1").val(thisid.substring(10));
				else
					$("#option_choice_2").val(thisid.substring(10));
			}
		});
	}
	if (checked > 2){
		alert("You can only have 2 choices! Revote!");
		$(".regular-checkbox").removeAttr("checked");
		$("#option_choice_1").val("");
		$("#option_choice_2").val("");
	}
}

