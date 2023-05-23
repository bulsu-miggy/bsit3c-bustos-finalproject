<!DOCTYPE html>
<html>
<head>
  <title>Data Display with jQuery</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .offer-container {
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
    }
    .offer-title {
      font-weight: bold;
    }
    .offer-price {
      color: #888;
    }
  </style>
</head>
<body>
  <div id="services"></div>

  <script>
    jQuery(document).ready(function($) {
      $.get("offers.xml", function(data) {
        var offer_data = $(data).find('service');
        var services = $("#services");

        $(offer_data).children("services").each(function(i, el) {
          var _offers = $(el).children("offers").text();
          var _prc = $(el).children("prc").text();

          var offerContainer = $('<div>').addClass('offer-container');
          var offerTitle = $('<div>').addClass('offer-title').text('Offers: ' + _offers);
          var offerPrice = $('<div>').addClass('offer-price').text('Price: ' + _prc);

          offerContainer.append(offerTitle, offerPrice);
          services.append(offerContainer);
        });
      });
    });
  </script>
</body>
</html>