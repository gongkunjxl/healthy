var sickData,lifeData;
$.getJSON("/static/js/sickTheme.json",function(data){ 
	sickData = data; 
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
var search = 0;

theme = document.getElementById("theme").value;
type = document.getElementById("type").value;
media = document.getElementById("media").value;
language = document.getElementById("language").value;
provData = document.getElementById("province").value;
search = document.getElementById("search").value;
//  the theme select
function selTheme(){
	theme = document.getElementById("theme").value;
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
	// location.href="/main/expert/1"
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
  	   if(search == ''){
  	   	  search = 0;
  	   }
  	  	//call the request
  	  requestData();
  	   return false;
    });

});

//request the data
function requestData(){
	if(search == ''){
  	  	search = 0;
 	}
	var base_url = "/main/";
	var url = '';
	// alert(media);
	switch (media)
	{
		case '0':
		{
			url = base_url+"searchIndex/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
		case '1':
		{
			url = base_url+"searchExpert/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
		case '2':
		{
			url = base_url+"searchVideo/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
		case '3':
		{
			url = base_url+"searchArticle/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
		case '4':
		{
			url = base_url+"searchAudio/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
		case '5':
		{
			url = base_url+"searchPicture/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
		case '6':
		{
			url = base_url+"searchPPT/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
		default:
		{
			url = base_url+"searchIndex/"+theme+"/"+type+"/"+media+"/"+language+"/"+provData+"/"+search;
			break;
		}
	}
	alert(url);
	location.href = url;

	// var data={
	// 	theme: theme ,
	// 	type: type,
	// 	media: media,
	// 	language: language,
	// 	provData: provData,
	// 	search: search
	// };
	// // alert(JSON.stringify(data));
	// $.ajax({
	// 	url: '/api/searchIndex',
	// 	type: 'post',
	// 	dataType:'json',
	// 	data: data,
	// 	success: function (data) {
	// 		// alert(JSON.stringify(data));
	// 		if(data.status == 200){

	// 			// alert("Update the index page");


	// 		}
	// 	},
	// 	error: function(data) {
	// 		alert("Sorry error");
	// 	}
	// }); 
}














