<div class="bersih">&nbsp;</div>
<div class="gr12 judul">BNI</div>
<div class="bersih">&nbsp;</div>
<div id="bni_jual" class="gr12"></div>
<div class="bersih">&nbsp;</div>
<div id="bni_beli" class="gr12">&nbsp;</div>
<div class="bersih">&nbsp;</div>

<div class="gr12"></div>
<script type="text/javascript">
$(function () {
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
            chart: {
                renderTo: 'bni_beli',
                type: 'line',
                marginRight: 130,
                marginBottom: 100,
				zoomType : 'y'
            },
            title: {
                text: 'Data Beli Kurs Rupiah(Rp)',
                x: -20 //center
            },
            subtitle: {
                text: 'Sumber:http://bni.co.id/informasivalas.aspx',
                x: -20
            },
            xAxis: {lineColor: 'red',tickColor: 'red',tickLength: 5,tickWidth: 1,tickPosition: 'outside',
                categories:
				<?php
					$simpan="[";
					$query = "select tanggal from (SELECT * from bni group by tanggal order by tanggal desc $limit) as x order by tanggal asc";
					$sql = mysql_query($query);
					while ($hasil = mysql_fetch_array($sql)){
						$tanggal = $hasil['tanggal'];
						$simpan="$simpan'$tanggal',";
					}
					$simpan=substr($simpan,0,strlen($simpan)-1);
					$simpan="$simpan]";
					echo $simpan;
				?> 
            },
            yAxis: {
                title: {
                    text: 'Nilai Kurs'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series:             
            <?php
				$sql   = "SELECT distinct mata_uang FROM bni";
				$query = mysql_query($sql);
				$simpan="[";
				while($hasil = mysql_fetch_array($query)){
					$mata = $hasil['mata_uang'];
					$simpan="$simpan{name:";
					$simpan="$simpan'$mata',data:[";
					
					$sql2   = "SELECT x.beli FROM (SELECT * from bni where mata_uang='$mata' group by tanggal order by tanggal desc $limit) as x order by x.tanggal asc";
					$query2 = mysql_query($sql2);
					while($hasil2 = mysql_fetch_array($query2)){
						$kurs = $hasil2['beli'];
						$simpan="$simpan$kurs,";
					}
					$simpan=substr($simpan,0,strlen($simpan)-1);
					$simpan="$simpan]},";
				}
				$simpan=substr($simpan,0,strlen($simpan)-1);
				$simpan="$simpan]";
				echo "$simpan";
            ?>
        });
	});
			$(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'bni_jual',
                type: 'line',
                marginRight: 130,
                marginBottom: 100,
				zoomType : 'y'
            },
            title: {
                text: 'Data Jual Kurs Rupiah(Rp)',
                x: -20 //center
            },
            subtitle: {
                text: 'Sumber:http://bni.co.id/informasivalas.aspx',
                x: -20
            },
            xAxis: {lineColor: 'red',tickColor: 'red',tickLength: 5,tickWidth: 1,tickPosition: 'outside',
                categories:
				<?php
				$simpan="[";
				$query = "select tanggal from (SELECT * from bni group by tanggal order by tanggal desc $limit) as x order by tanggal asc";
				$sql = mysql_query($query);
				while ($hasil = mysql_fetch_array($sql)){
					$tanggal = $hasil['tanggal'];
				$simpan="$simpan'$tanggal',";
				}
				$simpan=substr($simpan,0,strlen($simpan)-1);
				$simpan="$simpan]";
				echo $simpan;
				?> 
            },
            yAxis: {
                title: {
                    text: 'Nilai Kurs'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ''
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -10,
                y: 100,
                borderWidth: 0
            },
            series:             
            <?php
			$sql   = "SELECT distinct mata_uang FROM bni";
            $query = mysql_query($sql);
			$simpan="[";
            while($hasil = mysql_fetch_array($query)){
				$mata = $hasil['mata_uang'];
				$simpan="$simpan{name:";
				$simpan="$simpan'$mata',data:[";
				
				$sql2   = "SELECT x.jual FROM (SELECT * from bni where mata_uang='$mata' group by tanggal order by tanggal desc $limit) as x order by x.tanggal asc";
				$query2 = mysql_query($sql2);
				while($hasil2 = mysql_fetch_array($query2)){
					$kurs = $hasil2['jual'];
					$simpan="$simpan$kurs,";
				}
				$simpan=substr($simpan,0,strlen($simpan)-1);
				$simpan="$simpan]},";
            }
			$simpan=substr($simpan,0,strlen($simpan)-1);
			$simpan="$simpan]";
			echo "$simpan";
            ?>
        });
	});
});
</script>
