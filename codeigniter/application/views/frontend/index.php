<html>
<head>
  <title>Mapa interactivo de España SVG/RaphaëlJs - Demo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/rio-negro-map.js') ?>"></script>
  <style type="text/css">
    body {
      background: #fff;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
      text-align: center;
      color: #555;
    }
    h1 {
      font-size: 25px;
      padding: 30px 0 10px;
    }
    p {
      padding-bottom: 30px;
    }
    a {
      color: #66bbdd;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
 
  <p>Mapa vectorial interactivo de Río Negro creado a partir de un mapa SVG y la librería <a href="http://raphaeljs.com" target="_blank">RaphaëlJs</a>.</p>
  <div id="map">
  <script type="text/javascript">
    new RioNegroMap({
      id: 'map',
      width: 1100,
      height: 500,
      fillColor: "#eeeeee",
      strokeColor: "#cccccc",
      strokeWidth: 0.7,
      selectedColor: "#66bbdd",
      animationDuration: 200,
      onClick: function(province, event) {
        //alert("Has seleccionado " + province.name);
		window.location = "sede/search/" + province.number;
      }
    });
  </script>
</body>