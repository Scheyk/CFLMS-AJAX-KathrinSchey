<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		table, th, td {
   			border: 1px solid black;
   			border-collapse: collapse;
		}
		th,	td {
   			padding: 5px;
		}
	</style>
</head>
<body>

	<button type="button" onclick="showMusic()">show Playlist</button>
	<table id="music"></table>

	<script>
		function showMusic(){
			var songs = new XMLHttpRequest();
			songs.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200) {
					myFunction(this);
				}
			}

			songs.open("GET", "song.xml", true);
 			songs.send();
		}

		function myFunction(xml) {
       		var i;
       		var xmlDoc = xml.responseXML;
       		var table = "<tr><th>Title</th><th>Artist</th><th>Country</th><th>Genre</th><th>Year</th></tr>";       		
       		var x = xmlDoc.getElementsByTagName("song");

       		for (i = 0; i < x.length; i++) {
           		table += "<tr><td>" +
               	x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue +
               	"</td><td>" +
               	x[i].getElementsByTagName("artist")[0].childNodes[0].nodeValue +
               	"</td><td>" +
               	x[i].getElementsByTagName("country")[0].childNodes[0].nodeValue +
               	"</td><td>" +
               	x[i].getElementsByTagName("genre")[0].childNodes[0].nodeValue +
               	"</td><td>" +
               	x[i].getElementsByTagName("year")[0].childNodes[0].nodeValue +
               	"</td></tr>";
       		}

       		document.getElementById("music").innerHTML = table;
   		}

	</script>

</body>
</html>