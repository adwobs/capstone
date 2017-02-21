﻿(function () {

    document.addEventListener('deviceready', onDeviceReady.bind(this), false);
    var pictureSource;
    var destinationType;

    function onDeviceReady() {
        pictureSource = navigator.camera.PictureSourceType;
        destinationType = navigator.camera.DestinationType;

//
		$(function () {
             "use strict";
             $("#scanBarcode").click(function () {
                 cordova.plugins.barcodeScanner.scan(
                     function (result) {
                         alert("Information: " + result.text + "\n" +
                            "Format: " + result.format + "\n");
                         var studentid= result.text;
                         alert(studentid);
                     },
                     function (error) {
                         alert(error);
                     }
                 );
                 //end
             });
         });
		//

		//Geolocation start
         var c = function (pos) {
             var lat = pos.coords.latitude,
                 long = pos.coords.longitude,
                 coords = lat + ', ' + long;

             document.getElementById('google-map').setAttribute('src', 'http://maps.google.co.uk?q=' + coords + '&z=60&output=embed');

         }

         //get location function
         document.getElementById("getloc").onclick = function () {
             navigator.geolocation.getCurrentPosition(c);
             return false;
         }

    };

    function onPhotoDataSuccess(imageData) {

    }

    function onFail(message) {

    }

    function clearCache() {

    }  

})();

