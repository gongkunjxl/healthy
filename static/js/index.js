var sickData,lifeData;
$.getJSON("/static/js/sickTheme.json",function(data){ 
	sickData = data; 
	var typeObj = document.getElementById("type");
	var innerHTML = '';
	innerHTML=innerHTML+'<option value="0">类型</option>';
	// for(value in sickData){
	// 	innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
	// }
	typeObj.innerHTML = innerHTML;
}); 
$.getJSON("/static/js/lifeTheme.json",function(data){ 
	lifeData = data; 
});

// all the data
var theme = 0;
var type = 0;
var language = 0;
var province = 0;
//  the theme select
function selTheme(){
	var themeObj = document.getElementById("theme");
	theme = themeObj.value;
	var typeObj = document.getElementById("type");
	var innerHTML = '';
	innerHTML=innerHTML+'<option value="0">类型</option>';
	if(theme == 1){
	  	for(value in sickData){
			innerHTML=innerHTML+'<option value="'+sickData[value].id+'">'+sickData[value].name+"</option>";
		}
	}
	if(theme == 2){
		for(value in lifeData){
			innerHTML=innerHTML+'<option value="'+lifeData[value].id+'">'+lifeData[value].name+"</option>";
		}
	}
	typeObj.innerHTML = innerHTML;

	//call request function

}
// select the type
function selType(){
	type = document.getElementById("type").value;
	//call request function
}
// select the media
function selMedia(){
	media = document.getElementById("media").value;
	
	//call request function
}
// select the language
function selLanguage(){
	language = document.getElementById("language").value;
	//call request fucntion
}
//select the province
function selProvince(){
	province = document.getElementById("province").value;
	//call request fucntion
}
//request the data
function requestData(){
	
	
}












