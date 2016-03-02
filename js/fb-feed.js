$(document).ready(function() {
  $.ajaxSetup({ cache: true });
  $.getScript('http://connect.facebook.net/en_US/sdk.js', function(){


    var appFb = {
        appId: '952827554773199',
        secret: '235055866579a8e7eb3fe2ee86cbf1a0',
        accessToken:'CAANil3PvOM8BANf9AJ60gy2zEPZA7ZBJ4aoZCEhflnmRWLZAb4qlPea9LaVdfJASikBjkqlAHDtofLbVGTp1vCSuHqXAQKXtkx0KZCOs5wMp1ihBkSuzZCWgQIvpkWttM9NHtNRUKrFQltmspmMwbVaBLHdYdF6n9SwMzaKpupRw8g0OrjuBY2VQkpCKR5vNsZD', // 02-02-16
        version: 'v2.5' // or v2.0, v2.1, v2.2, v2.3
    }
    // console.log(FB);

    FB.init({
        appId: appFb.appId,
        accessToken: appFb.accessToken,
        secret: appFb.secret,
        version: appFb.version
    });

    var getFeed = function () {
        FB.api(
        '/me/feed',
        'GET',
        {"limit": "10"},
        function(res) {

            console.log(res);
        });
    }

    console.log("pegando feed...");
    getFeed();
  });
});
