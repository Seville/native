function renderUserInfo(content, data){
	document.getElementsByTagName('MAIN')[0].innerHTML = content;
	if(document.getElementsByClassName('user_email').length !== 0)document.getElementsByClassName('user_email')[0].innerHTML = data.email;
	if(document.getElementsByClassName('user_username').length !== 0)document.getElementsByClassName('user_username')[0].innerHTML = data.username;
	if(document.getElementsByClassName('user_password').length !== 0)document.getElementsByClassName('user_password')[0].innerHTML = data.password;
}