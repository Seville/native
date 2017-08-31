(function(){
	//Register view click events
	window.onhashchange = viewManager;
	window.onload = viewManager;

	//View view manager
	function viewManager(e){
		var self = this;
		self.ajax = new XMLHttpRequest();
		self.ajax.open('POST', 'main_scripts/views.php', true);
		if(e.type == "hashchange"){
			self.ajax.send(getViewString(e.newURL));
		}else{
			self.ajax.send(getViewString(window.location.href));
		}
			
		self.ajax.onreadystatechange = function () {
			if(this.readyState == 4 && this.status == 200){
				try{
					var responseObj = JSON.parse(this.response);
					var data = JSON.parse(responseObj.data);
					switch(data.type){
						case 'userinfo':
							renderUserInfo(responseObj.content, data);
							break;
					}
				}catch(e){
					document.getElementsByTagName('MAIN')[0].innerHTML = this.response;
				}
			}
		};
	}

	function getViewString(view){
		var start_pos = view.indexOf('#') + 1;
		var end_pos = view.indexOf('?',start_pos);
		if(end_pos !== -1){
			return view.substring(start_pos,end_pos)
		}else{
			return view.split("#")[1];
		}
	}
}());