<!DOCTYPE html>
<html>
<head>
    <!--Setting up Webpage--->
    <title>Frontline GIS Soloutions</title>
    <link rel="icon" href="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/Globe.png"><meta charset="utf-8" />
    <!--Linking Stylesheets--->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <link rel="stylesheet" href="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap/L.Control.Layers.Tree.css">
    <!--Linking Scripts--->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="crossorigin=""></script>
    <script src="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap/L.Control.Layers.Tree.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body style="background-image: url('https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/background.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <table style="width:100%">
        <tr>
            <td style="width:300px"><a href="https://frontlinegissol.wixsite.com/home"><img src="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/FrontlineGIS_Logo.png" width="auto" height="100" href="https://www.qries.com/"></a></td>
            <td style="background-color:#195E83; width:100%;">
                <h1 style="color:#FBBF4D;"><u>Mapping Mamelodi Healthsites to Optimize Covid-19 Vaccine Distribution</u></h1>
            </td>
        </tr>
    </table>
    <br>

<div class="content">
    <div class="left" id="map" style="width: 50%; height: 600px; border-style: ridge; border-width: 3px; border-radius: 8px; ; border-color: #006994;"></div> <!--border colour is sea blue-->
      <div class="right">
      <div class="box" style="height:200px;">
      <h2 style="color:#FBBF4D;">Clinic Calculation Tool</h2>
      <form name="calculator" action="webmap.php" onsubmit="validateCalculator()" method="POST" >
          Number of Vaccinations Available: <input type="int" name="vaccinations_available" /> <br>
          <?php
          	$host = "host=db.geolive.co.za";
            $port = "port=5432";
            $dbname = "dbname=FGS";
            $credentials = "user=postgres password=T5YCzESQ3HPI";
            $db = pg_connect("$host $port $dbname $credentials");

            if(!$db) {echo('<p><img src="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/red-connect.png" style="height:20px; width:20px;">');} 
            else {echo '<p><img src="https://geo-classroom.github.io/group-project-frontline-gis-solutions/Webmap_Images/green-connect.png" style="height:20px; width:20px;">';}
          ?>
          <input type="submit"/>
      </form>
      <?php
        $mahube_valley_pharmacy = 0.02848  * $_POST[vaccinations_available];
        $hospital = 0.06719 * $_POST[vaccinations_available];
        $dischem_mams_mall = 0.03641* $_POST[vaccinations_available];
        $stanza_bopape_chc = 0.08662* $_POST[vaccinations_available];
        $stanza_2_clinic = 0.08141* $_POST[vaccinations_available];
        $tshepong_pharmacy = 0.06488* $_POST[vaccinations_available];
        $holani_clinic = 0.05474* $_POST[vaccinations_available];
        $mamelodi_hospital_pharmacy = 0.09192* $_POST[vaccinations_available];
        $khutsong_pharmacy = 0.0334* $_POST[vaccinations_available];
        $ame_pharmacy = 0.08698* $_POST[vaccinations_available];
        $mamelodi_west_clinic = 0.08746* $_POST[vaccinations_available];
        $mamelodi_hospital = 0.0222* $_POST[vaccinations_available];
        $phahameng_clinic = 0.07575* $_POST[vaccinations_available];
        $maruke_pharmacy_mamelodi_gardens = 0.06542* $_POST[vaccinations_available];
        $mamelodi_east_clinic = 0.06174* $_POST[vaccinations_available];
        $lusaka_clinic = 0.0554* $_POST[vaccinations_available];
        if(is_numeric($_POST[vaccinations_available]))
        {
          $query = "INSERT INTO clinic_weights VALUES ('$_POST[vaccinations_available]','$mahube_valley_pharmacy','$hospital','$dischem_mams_mall','$stanza_bopape_chc',
          '$stanza_2_clinic','$tshepong_pharmacy','$holani_clinic','$mamelodi_hospital_pharmacy','$khutsong_pharmacy','$ame_pharmacy','$mamelodi_west_clinic',
          '$mamelodi_hospital','$phahameng_clinic','$maruke_pharmacy_mamelodi_gardens','$mamelodi_east_clinic','$lusaka_clinic')";
        }

        $result = pg_query($query);
      ?>
    </div>
      <div class="box" style="height:395px; margin-top: 5px;">
        <style type="text/css">
            .tg  {border-collapse:collapse;border-color:#9ABAD9;border-spacing:0;}
            .tg td{background-color:#EBF5FF;border-color:#9ABAD9;border-style:solid;border-width:1px;color:#444;
              font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:3px 0px;word-break:normal;}
            .tg th{background-color:#409cff;border-color:#9ABAD9;border-style:solid;border-width:1px;color:#fff;
              font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:3px 0px;word-break:normal;}
            .tg .tg-0lax{text-align:left;vertical-align:top}
            </style>
            <table class="tg" style="table-layout: fixed;">

            <thead>
              <tr>
                <th class="tg-0lax"><b>Health site</b></th>
                <th class="tg-0lax"><b>Catchment area (Ha)</b></th>
                <th class="tg-0lax"><b>Population served</b></th>
                <th class="tg-0lax"><b>Vaccines Allocated</b></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-0lax">Mahube Valley Pharmacy </td>
                <td class="tg-0lax">173,480</td>
                <td class="tg-0lax">10451,107</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Khutsong Pharmacy</td>
                <td class="tg-0lax">201,631</td>
                <td class="tg-0lax">12259,140</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Dischem Pharmacy Mamelodi Mall</td>
                <td class="tg-0lax">186,373</td>
                <td class="tg-0lax">13364,745</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Holani Clinic</td>
                <td class="tg-0lax">256,334</td>
                <td class="tg-0lax">20091,047</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Lusaka Clinic</td>
                <td class="tg-0lax">184,064</td>
                <td class="tg-0lax">20333,442</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Mamelodi East Clinic</td>
                <td class="tg-0lax">188,801</td>
                <td class="tg-0lax">22660,093</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Tshepong Pharmacy</td>
                <td class="tg-0lax">248,525</td>
                <td class="tg-0lax">23810,814</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Maruke Pharmacy</td>
                <td class="tg-0lax">261,055</td>
                <td class="tg-0lax">24010,015</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Mamelodi Hospital</td>
                <td class="tg-0lax">266,388</td>
                <td class="tg-0lax">24659,188</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Phahameng Clinic</td>
                <td class="tg-0lax">312,090</td>
                <td class="tg-0lax">27801,912</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Stanza 2 Clinic </td>
                <td class="tg-0lax">240,402</td>
                <td class="tg-0lax">29877,618</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Stanza Bopape</td>
                <td class="tg-0lax">334,810</td>
                <td class="tg-0lax">31790,841</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">AME Pharmacy</td>
                <td class="tg-0lax">355,064</td>
                <td class="tg-0lax">31922,455</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Mamelodi West Clinic</td>
                <td class="tg-0lax">372,875</td>
                <td class="tg-0lax">32099,034</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Mamelodi Hospital Pharmacy </td>
                <td class="tg-0lax">409,899</td>
                <td class="tg-0lax">33735,648</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
              <tr>
                <td class="tg-0lax">Mamelodi Hospital </td>
                <td class="tg-0lax">184,312</td>
                <td class="tg-0lax">8146,506</td>
                <td class="tg-0lax">XXXXXXXXXX</td>
              </tr>
            </tbody>
            </table>
    </div>
    </div>
  </div>
<script src="myScripts.js"></script>
	
</body>
</html>