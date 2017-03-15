(function($){$(function(){

$('#adduser').click(function(){
	var ver=verify([['last_name','name'],['first_name','name'],['father_name','name'],['pass1','pass'],['pass2','pass'],['phone','tel'],['email','email']]);
	if (ver) return true;
	return false;
});

})})(jQuery)