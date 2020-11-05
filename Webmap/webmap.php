<!DOCTYPE html>
<html>
<head>
    <!--Setting up Webpage--->
    <title>Frontline GIS Soloutions</title>
    <link rel="icon" href="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/Globe.png"><meta charset="utf-8" />
    <!--Linking Stylesheets--->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <link rel="stylesheet" href="../Webmap/L.Control.Layers.Tree.css">
    <!--Linking Scripts--->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="crossorigin=""></script>
    <script src="../Webmap/L.Control.Layers.Tree.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="background-image: url('https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/background.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <table style="width:100%">
        <tr>
            <td style="width:300px"><a href="https://frontlinegissol.wixsite.com/home"><img src="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/FrontlineGIS_Logo.png" width="auto" height="100" href="https://www.qries.com/"></a></td>
            <td style="background-color:#195E83; width:100%;">
                <h1 style="color:#FFA500; align:center; font-size:30px;"><b>Mapping Mamelodi Healthsites to Optimize Covid-19 Vaccine Distribution<b></h1>
            </td>
        </tr>
    </table>
    <br>

<div class="content">
    <div class="left" id="map" style="width: 50%; height: 600px; border-style: ridge; border-width: 3px; border-radius: 8px; ; border-color: #006994;"></div> <!--border colour is sea blue-->
      <div class="right">
      <div class="box" style="height:150px; border-style: ridge; border-width: 3px; border-radius: 8px; border-color: #006994;"> <!-- the blue box with input and submit button -->
      <h2 style="color:#FBBF4D;">Clinic Calculation Tool</h2>
      <div id="calculator_form">
        <form name="calculator" action="" >
            <label style="color:white;">Number of Vaccinations Available:</label> 
            <input id="vaccInput" type="number" name="vaccinations_available" />
            <?php
              $host = "host=db.geolive.co.za";
              $port = "port=5432";
              $dbname = "dbname=FGS";
              $credentials = "user=postgres password=T5YCzESQ3HPI";
              $db = pg_connect("$host $port $dbname $credentials");

              if(!$db) {echo('<p><img src="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/red-connect.png" style="height:20px; width:20px;">');} 
              else {echo '<p><img src="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/green-connect.png" style="height:20px; width:20px;">';}
            ?>
            <input type="submit" id="submit_btn" value="Calculate"/>
        </form>
      </div>
      <?php
        $vac_avail = $_POST['vaccinations_available'];
        
        $mahube_valley_pharmacy = round(0.02848  * $vac_avail);
        $hospital = round(0.06719 * $vac_avail);
        $dischem_mams_mall = round(0.03641* $vac_avail);
        $stanza_bopape_chc = round(0.08662* $vac_avail);
        $stanza_2_clinic = round(0.08141* $vac_avail);
        $tshepong_pharmacy = round(0.06488* $vac_avail);
        $holani_clinic = round(0.05474* $vac_avail);
        $mamelodi_hospital_pharmacy = round(0.09192* $vac_avail);
        $khutsong_pharmacy = round(0.0334* $vac_avail);
        $ame_pharmacy = round(0.08698* $vac_avail);
        $mamelodi_west_clinic = round(0.08746* $vac_avail);
        $mamelodi_hospital = round(0.0222* $vac_avail);
        $phahameng_clinic = round(0.07575* $vac_avail);
        $maruke_pharmacy_mamelodi_gardens = round(0.06542* $vac_avail);
        $mamelodi_east_clinic = round(0.06174* $vac_avail);
        $lusaka_clinic = round(0.0554* $vac_avail);
        if(is_numeric($vac_avail))
        {
          $query = "INSERT INTO clinic_weights VALUES ('$_POST[vaccinations_available]','$mahube_valley_pharmacy','$hospital','$dischem_mams_mall','$stanza_bopape_chc',
          '$stanza_2_clinic','$tshepong_pharmacy','$holani_clinic','$mamelodi_hospital_pharmacy','$khutsong_pharmacy','$ame_pharmacy','$mamelodi_west_clinic',
          '$mamelodi_hospital','$phahameng_clinic','$maruke_pharmacy_mamelodi_gardens','$mamelodi_east_clinic','$lusaka_clinic')";
        }

        $result = pg_query($query);
      ?>
    </div>
    <div class="box" style="height:445px; margin-top: 5px; border-style: ridge; border-width: 3px; border-radius: 8px; ; border-color: #006994;"> <!-- blue box with the table -->
        <style type="text/css">
            .tg  {border-collapse:collapse;border-color:#9ABAD9;border-spacing:0;}
            .tg td{background-color:#EBF5FF;border-color:#9ABAD9;border-style:solid;border-width:1px;color:#444;
              font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:3px 0px;word-break:normal;}
            .tg th{background-color:#409cff;border-color:#9ABAD9;border-style:solid;border-width:1px;color:#fff;
              font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:3px 0px;word-break:normal;}
            .tg .tg-0lax{text-align:left;vertical-align:top}
            </style>
            <table class="tg" style="table-layout: fixed; align:center;">
            <colgroup>
            <col style="width: 220px; padding:5px;">
            <col style="width: 145px;">
            <col style="width: 160px;">
            </colgroup>
            <thead>
              <tr>
                <th class="tg-0lax"><b>Health site</b></th>
                <th class="tg-0lax"><b>Catchment area (Ha)</b></th>
                <th class="tg-0lax"><b>Population served</b></th>
                <th class="tg-0lax"><b>Vaccines Allocated</b></th>
              </tr>
            </thead>
            <tbody>
            <tr onmouseover="highlightcatchFeature(CL8)" onmouseout="resetcatchHighlight(CL8)">
                <td class="tg-0lax">Mamelodi Hospital Pharmacy </td>
                <td class="tg-0lax">409.90</td>
                <td class="tg-0lax">33 736</td>
                <td class="tg-0lax" id="CL8">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL11)" onmouseout="resetcatchHighlight(CL11)">
                <td class="tg-0lax">Mamelodi West Clinic</td>
                <td class="tg-0lax">372.88</td>
                <td class="tg-0lax">32 099</td>
                <td class="tg-0lax" id="CL11">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL10)" onmouseout="resetcatchHighlight(CL10)">
                <td class="tg-0lax">AME Pharmacy</td>
                <td class="tg-0lax">355.06</td>
                <td class="tg-0lax">31 923</td>
                <td class="tg-0lax" id="CL10">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL4)" onmouseout="resetcatchHighlight(CL4)">
                <td class="tg-0lax">Stanza Bopape</td>
                <td class="tg-0lax">334.81</td>
                <td class="tg-0lax">31 791</td>
                <td class="tg-0lax" id="CL4">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL5)" onmouseout="resetcatchHighlight(CL5)">
                <td class="tg-0lax">Stanza 2 Clinic </td>
                <td class="tg-0lax">240.40</td>
                <td class="tg-0lax">29 878</td>
                <td class="tg-0lax" id="CL5">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL13)" onmouseout="resetcatchHighlight(CL13)">
                <td class="tg-0lax">Phahameng Clinic</td>
                <td class="tg-0lax">312.09</td>
                <td class="tg-0lax">27 802</td>
                <td class="tg-0lax" id="CL13">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL2)" onmouseout="resetcatchHighlight(CL2)">
                <td class="tg-0lax">Hospital</td>
                <td class="tg-0lax">266.39</td>
                <td class="tg-0lax">24 660</td>
                <td class="tg-0lax" id="CL2">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL14)" onmouseout="resetcatchHighlight(CL14)">
                <td class="tg-0lax">Maruke Pharmacy</td>
                <td class="tg-0lax">261.06</td>
                <td class="tg-0lax">24 011</td>
                <td class="tg-0lax" id="CL14">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL6)" onmouseout="resetcatchHighlight(CL6)">
                <td class="tg-0lax">Tshepong Pharmacy</td>
                <td class="tg-0lax">248.53</td>
                <td class="tg-0lax">23 811</td>
                <td class="tg-0lax" id="CL6">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL15)" onmouseout="resetcatchHighlight(CL15)">
                <td class="tg-0lax">Mamelodi East Clinic</td>
                <td class="tg-0lax">188.80</td>
                <td class="tg-0lax">22 661</td>
                <td class="tg-0lax" id="CL15">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL16)" onmouseout="resetcatchHighlight(CL16)">
                <td class="tg-0lax">Lusaka Clinic</td>
                <td class="tg-0lax">184.06</td>
                <td class="tg-0lax">20 334</td>
                <td class="tg-0lax" id="CL16">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL7)" onmouseout="resetcatchHighlight(CL7)">
                <td class="tg-0lax">Holani Clinic</td>
                <td class="tg-0lax">256.33</td>
                <td class="tg-0lax">20 092</td>
                <td class="tg-0lax" id="CL7">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL3)" onmouseout="resetcatchHighlight(CL3)">
                <td class="tg-0lax">Dischem Pharmacy Mamelodi Mall</td>
                <td class="tg-0lax">186.37</td>
                <td class="tg-0lax">13 365</td>
                <td class="tg-0lax" id="CL3">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL9)" onmouseout="resetcatchHighlight(CL9)">
                <td class="tg-0lax">Khutsong Pharmacy</td>
                <td class="tg-0lax">201.63</td>
                <td class="tg-0lax">12 259</td>
                <td class="tg-0lax" id="CL9">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL1)" onmouseout="resetcatchHighlight(CL1)">
                <td class="tg-0lax" >Mahube Valley Pharmacy</td>
                <td class="tg-0lax">173.48</td>
                <td class="tg-0lax">10 452</td>
                <td class="tg-0lax" id="CL1">---</td>
              </tr>
              <tr onmouseover="highlightcatchFeature(CL12)" onmouseout="resetcatchHighlight(CL12)">
                <td class="tg-0lax">Mamelodi Hospital </td>
                <td class="tg-0lax">184.31</td>
                <td class="tg-0lax">8 147</td>
                <td class="tg-0lax"id="CL12">---</td>
              </tr>
              <tr>
                <td class="tg-0lax"><b>TOTAL</b></td>
                <td class="tg-0lax"><b>4 176.10</b></td>
                <td class="tg-0lax"><b>367 014</b></td>
                <td class="tg-0lax"id="CLtotal"><strong>---</strong></td>
              </tr>
            </tbody>
            </table>
    </div>
    </div>
  </div>
<script src="myScripts.js"></script>
	
</body>
</html>
