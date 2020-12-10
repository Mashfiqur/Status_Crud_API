<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consume API JQuery</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


</head>
<body>
<h3 class="mt-3 text-center">Consume API Through JQuery</h3>
<div class="container py-5">


<table class="table table-bordered table-stripped table-hover" >

<thead>
<tr>
<th>#</th>
<th>Author</th>
<th>Quote</th>
</tr>
<tbody id="statusData">


</tbody>


</thead>

</table>
<div id="loader"></div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>

$(document).ready(function() {
    $.ajax({
        url: "https://type.fit/api/quotes",
        dataType:"json",
        cache: false,
    	beforeSend: function() {
                $('#loader').html('<img src="{{ asset('/load.gif') }}" alt="reload" width="20" height="20" style="display: block;margin-left: auto;margin-right: auto;width: 40%;height:400px;">');
    			
            },
    }).then(function(data) {

        var html = '';
    

        for(var count=0; count < data.length; count++){
							html +='<tr>';
							html +='<td>'+(count+1)+'</td>';
							html +='<td>'+data[count].author+'</td>';
							html +='<td>'+data[count].text+'</td>';
                            html +='</tr>';
						} $("#statusData").html(html);
    });
});


</script>

</body>
</html>