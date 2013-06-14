<!DOCTYPE html>
<html>
<head></head>
<body>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script>
$(document).ready(function() {
    $('#submit').click(function(event) {
        $('#result').html('Proses Pengambilan Data . . .');
        var FormData = $('#FormTiket').serialize();
        event.preventDefault();
        $.ajax({
            type : "GET",
            url:'tiket.php',
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
<form id="FormTiket" name="FormTiket">
<table>
    <tr>
        <td>Kota Asal</td>
        <td>:</td>
        <td>
        <select id="asal" name="asal">
            <option value="CGK">Jakarta</option>
            <option value="BTH">Batam</option>
            <option value="DPS">Denpasar</option>
         </select>
        </td>
    </tr>
    <tr>
        <td>Kota Tujuan</td>
        <td>:</td>
        <td>
        <select id="tujuan" name="tujuan">
            <option value="DPS">Denpasar</option>
            <option value="AMQ">Ambon</option>
            <option value="BPN">Balikpapan</option>
         </select>
        </td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>
        <select id="tanggal" name="tanggal">
            <option value="2013-06-01">01-06-2013</option>
            <option value="2013-06-02">02-06-2013</option>
            <option value="2013-06-03">03-06-2013</option>
            <option value="2013-06-04">04-06-2013</option>
            <option value="2013-06-05">05-06-2013</option>
            <option value="2013-06-06">06-06-2013</option>
         </select>
        </td>
    </tr>
    <tr>
        <td>Proses</td>
        <td>:</td>
        <td>
        <input type="submit" id="submit" name="submit" value="Cek">
        </td>
    </tr>
</table>
</form>
<hr>
<div id="result">
 
</div>
</body>
</html>