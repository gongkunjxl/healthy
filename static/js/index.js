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
var media = 0;
var language = 0;
var provData = 0;
var search = '';
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
	requestData();
}
// select the type
function selType(){
	type = document.getElementById("type").value;
	//call request function
	requestData();
}
// select the media
function selMedia(){
	media = document.getElementById("media").value;
	//call request function
	requestData();
}
// select the language
function selLanguage(){
	language = document.getElementById("language").value;
	//call request fucntion
	requestData();
}
//select the province
function selProvince(){
	provData = document.getElementById("province").value;
	//call request fucntion
	requestData();
}
layui.use(['layer', 'form'], function(){
  var layer = layui.layer
  ,form = layui.form;
  form.on('submit(searchData)', function(data){
  	// alert(JSON.stringify(data.field.search));
  	   search = data.field.search;
  	  	//call the request
  	  requestData();
  	   return false;
    });

});

//request the data
function requestData(){
	var data={
		theme: theme ,
		type: type,
		media: media,
		language: language,
		provData: provData,
		search: search
	};
	// alert(JSON.stringify(data));
	$.ajax({
		url: '/api/searchIndex',
		type: 'post',
		dataType:'json',
		data: data,
		success: function (data) {
			// alert(JSON.stringify(data));
			if(data.status == 200){
				alert("Update the index page");
				




			}
		},
		error: function(data) {
			alert("Sorry error");
		}
	}); 
}














