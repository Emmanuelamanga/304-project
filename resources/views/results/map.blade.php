<?php
    // Include the `../src/fusioncharts.php` file that contains functions to embed the charts.
    // include("includes/fusioncharts.php");
?>
<html>
    <head>
        <title>FusionCharts | My First Map</title>`
        
        <script type="text/javascript" src="{{ asset('js/php_charts/fusioncharts-suite-xt/js/fusioncharts.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('js/php_charts/fusioncharts-suite-xt/js/fusioncharts.charts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/php_charts/fusioncharts-suite-xt/js/themes/fusioncharts.theme.fint.js') }}"></script>

  </head>
    <body>
        <?php
        // Widget appearance configuration
        $arrMapConfig = array(
            "chart" => array(
                "caption" => "Average Annual Population Growth",
                "subcaption" => " 1955-2015",
                "numbersuffix" => "%",
                "includevalueinlabels" => "1",
                "labelsepchar" => ": ",
                "entityFillHoverColor" => "#FFF9C4",
                "theme" => "fusion"
            )
        );

        // Widget color range data
        $colorDataObj = array("minvalue" => "0", "code" => "#FFE0B2", "gradient" => "1",
        "color" => array(
            ["minValue" => "0", "maxValue" => "50", "code" => "#F2726F"],
            ["minValue" => "50", "maxValue" => "75", "code" => "#FFC533"],
            ["minValue" => "75", "maxValue" => "100", "code" => "#62B58F"]
        ));

        // Map data array
        $mapDataArray = array(
            ["NA", ".82", "1"],
            ["SA", "2.04", "1"],
            ["AS", "1.78", "1"],
            ["EU", ".40", "1"],
            ["AF", "2.58", "1"],
            ["AU", "1.30", "1"]
        );

        $mapData = array();

        for($i = 0; $i < count($mapDataArray); $i++) {
            array_push($mapData,array("id" => $mapDataArray[$i][0], "value" => $mapDataArray[$i][1], "showLabel" => $mapDataArray[$i][2]));
        }

        $arrMapConfig["colorRange"] = $colorDataObj;
        $arrMapConfig["data"] = $mapData;

        // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
        $jsonEncodedData = json_encode($arrMapConfig);

        // Map object
        $Map = new FusionCharts("maps/world", "MyFirstMap" , "800", "500", "map-container", "json", $jsonEncodedData);

        // Render the Map
        $Map->render();
        ?>
        <center>
            <div id="map-container">Map will render here!</div>
        </center>
    </body>
</html>