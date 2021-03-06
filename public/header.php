<!-- debug -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<!-- /debug -->
<script>
$(document).ready(function() {
    $('#submit').click(function(event) {
        $('#result').html('Proses Pengambilan Data . . .');
        var FormData = $('#FormTiket').serialize();
        event.preventDefault();
        $.ajax({
            type : "GET",
            url:'http://www.situs.com/tiket.php',
            data: FormData,
            cache: false,
            dataType: "jsonp",
            success:function(data){
                    if(data==''){
                        $('#result').empty();
                        $('#result').html('Maaf, data tidak ada untuk rute ini.');
                    }else{
                        $('#result').empty();
                        var div = $("#result");
                        for(var i=0; i<data[0].departures.result.length;i++){                       
                            div.append("Flight ID : "+data[0].departures.result[i].flight_id+"<br>");div.append("Nama Airlines : "+data[0].departures.result[i].airlines_name+"<br>");div.append("No. Penerbangan : "+data[0].departures.result[i].flight_number+"<br>");div.append("Harga Tiket : "+data[0].departures.result[i].price_value+"<br>");div.append("Jam Berangkat : "+data[0].departures.result[i].simple_departure_time+"<br>");div.append("Jam Tiba : "+data[0].departures.result[i].simple_arrival_time+"<br>");div.append("Durasi Perjalanan : "+data[0].departures.result[i].duration+"<br>");div.append("Gambar : "+data[0].departures.result[i].image+"<br>");div.append("<hr>");           
                        }  
                    }
                }
        })
    });
});
</script>
<!-- header -->
<div class="container">
<div class="header">
	
    <div class="header-date"><?php echo date("l, d F Y");?></div>

</div><!-- /.header -->

<div class="header-content">
	<div class="logo"></div>
</div><!-- /.header-content -->

</div><!-- /.container -->
<!-- /header -->

