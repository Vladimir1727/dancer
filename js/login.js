(function($){$(function(){

$('#login_but').click(function(){
	var ver=verify([['email','email'],['pass','password']]);
	if (ver) return true;
	return false;
});

})})(jQuery)