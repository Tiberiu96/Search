
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link type ="text/css" rel ="stylesheet" href="style.css"/>
</head>
<body>
	<nav>
		<div class ="welcome">
			<h1>Bine ati venit</h1>
		</div>
		<div class="search-div">
		
			<input id="text" type="text" placeholder="Introdu un termen de cautare..."/>
			<button type="button" id="cauta">CAUTA</button>
		
		</div>
	</nav>
	<section>
		<div class="container">
		<div class="mini-container" id="mini-container"></div>
	   </div>
	</section>
	<script src="https://app.web-adv.ro/el/js/jquery.js"></script>
	<script>
	   $(function(){
           $('#cauta').click(function(){
           		var text = $("#text").val();
           		$.ajax({
           			url: "curl.php",
           			type: "POST",
           			dataType: "json",
           			data:{
           				r: new Date().getTime(),
           				text: text
           			},
           			success: function(data){
           				var response = JSON.parse(data);
           				console.log(response.data);
           				for(var i=0;i<response.data.length;i++){
           					//console.log("SAL");
           					var div = 
           					`<div class ="data-div" style="background:white; width:49%;margin:3px;display:flex;flex-directon-row;">
           						<div class="imgDiv" style="width:40%;height:150px;">
           							<img width="100%" height="100%" style="object-fit:cover;" src ="https://frankfurt.apollo.olxcdn.com:443/v1/files/${response.data[i].photos[0].filename}/image"></img>
           						</div>
           						<div class="description" style="width:60%;padding:2px;">
           							<h5 style="padding:3px"> ${response.data[i].title}</h5>
           							<h4 style="padding:3px">${response.data[i].params[response.data[i].params.findIndex(p => p.key == "price")].value.value} ${response.data[i].params[response.data[i].params.findIndex(p => p.key == "price")].value.currency}</h4><br></br>
           							<h5>${response.data[i].location.city.name}, ${response.data[i].location.region.name}</h5>
           						</div>
           						

           					</div>`
           					$("#mini-container").append(div);
           				}

           			}

           		});
           });
	   });
	</script>
</body>
</html>



