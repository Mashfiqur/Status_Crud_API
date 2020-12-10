<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
    <table border='1' id="quotes">
    <!-- Make a Header Row -->
    <tr>
        <td><b>Author</b></td>
        <td><b>Quote</b></td>
    </tr>
</table>
    
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "https://type.fit/api/quotes",
                dataType: "xml",
                success: function (xml) {                   
                    $(xml).find('Quote').each(function () {
                        var author = $(this).find('author').text();
                        var quote = $(this).find('text').text();
                        // var price = $(this).find('Price').text();
                        // var category = $(this).find('CategoryName').text();
                        $('<tr><td>' + id + '</td><td>' + 
                        author + '</td><td>' + quote + '</td></tr>').appendTo('#quotes');                       
                    });
                },
                error: function (xhr) {
                    alert(xhr.responseText);
                }
            });
        });
      </script>
</script>
</body>
</html>
