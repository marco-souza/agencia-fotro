navApp.controller('menuCtrl', ['$scope', '$http', function($scope, $http) {

    $scope.currentPage = 1;

    // Get Images
    $scope.items = [
        {
            "id": 1,
            "name": "Portfolio",
            "icon": "fa-photo",
            "link": "#"
        },
        {
            "id": 2,
            "name": "Posts Recentes",
            "icon": "fa-newspaper-o",
            "link": "#"
        },
          {
              "id": 3,
              "name": "Histórias",
              "icon": "fa-book",
              "link": "#"
          },
        {
            "id": 4,
            "name": "Contato",
            "icon": "fa-comments-o",
            "link": "#"
        }
    ];

    $scope.selected = function (a, b) {
        // console.log(a+" == "+b);
        if (a == b) {
            // console.log(a+" == "+b);
            return "selec";
        }else {
            return "";
        }
    };

    $scope.changePage = function (n) {
        // console.log(n);

        $("#content").animate({'margin-left': "60px"}, 200);

        $("#menu > div spam").hide()
        $("#nav").animate({'width': "60px"}, 200);

        $("#social").animate({'width': "60px"}, 200);
        // $("#social h5").hide()

        $("#btn").animate({'width': "60px"}, 200);

        $scope.currentPage = n;
    }
    // $.getJSON( "./js/items.json", function( data ) {
    //     console.log(data);
    //   });
    // $http.get("./js/items.json").then(function(res) {
    //   // $scope.items = res.data;
    //   // alert(res.data.records);
    // });


}]);

navApp.controller('portfolioCtrl', ['$scope', '$http', function($scope, $http) {

    $scope.$on("onRepeatLast", function() {
        showCase();
    });

    $scope.Back = function(){
        if ($scope.viewImage) {
            $scope.viewAlbum = true;
            $scope.viewImage = false;
            return;
        }else
        if($scope.viewAlbum) {
            $scope.viewAlbum = false;
        }
        $scope.viewImage = false;
        $http({
            method: 'GET',
            url: 'https://api.flickr.com/services/rest',
            params: {
                method: 'flickr.photosets.getList',
                api_key: '7868a267c2c5550fcc2bb041105cb4cd', // 'af52c0a54446e916480f184e72de1c8a',
                user_id: '137657298@N03', //'134716620@N02',
                format: 'json',
                nojsoncallback: 1
            }
        }).then(
            function(data) {
                $scope.data = (data.data);
                // console.log(data);
            },
            function(err) {
                console.log(err);
            }
        );
    }

    $scope.Back();

    $scope.detail = function(id_album) {
        $scope.viewAlbum = true;
        $http({
            method: 'GET',
            url: 'https://api.flickr.com/services/rest',
            params: {
                method: 'flickr.photosets.getPhotos',
                api_key: '7868a267c2c5550fcc2bb041105cb4cd', // 'af52c0a54446e916480f184e72de1c8a',
                user_id: '137657298@N03', //'134716620@N02',
                format: 'json',
                photoset_id: id_album,
                nojsoncallback: 1
            }
        }).then(
            function(data) {

                $scope.data = (data.data);
                // console.log(data);
            },
            function(err) {
                console.log(err);
            }
        );
    }

    $scope.showImage = function(photoId) {
        $scope.imgSelected = photoId;
    }
    $scope.closeImg = function() {
        $scope.imgSelected = 0;
    }

}]);

navApp.controller('postsCtrl', ['$scope', '$http', function($scope, $http) {

    $scope.$on("onRepeatLast", function() {
        showCase();
    });

    $http({
        method: 'GET',
        url: 'https://graph.facebook.com/v2.5/1693385387540997/feed',
        params: {
            limit: '12',
            access_token: 'EAANil3PvOM8BACbyWYdatQXmTmjVIL3KZCbZCZCG0fxOZBCtTYpIZClULPKBL7vkHmc4m3wADvfArqQZBn3oPPX83z6uNVvwXa63ChVY57xgZB8VpA7xJOP7zGSD8oMkKZCD2OWTlKbJVrWZB9H5oVGC3SCHt30Es0iMZD',
            fields:'full_picture,created_time,link,message',
            format: 'json'
        }
    }).then(
        function(data) {
            $scope.data = data.data;
            // console.log($scope.data.data);
        },
        function(err) {
            console.log(err);
        }
    );
}]);

navApp.controller('hitsCtrl', ['$scope', '$http', function($scope, $http) {

    $scope.$on("onRepeatLast", function() {
        showCase();
    });

    parseRSS(
      'https://medium.com/feed/@agenciafotro', //URL's RSS
      function(data) {
        console.log(data);
        data.entries.forEach(function(v,i){
          $(v.content).appendTo('#feed-rss');
          console.log($('#feed-rss div').last());
          var cont = $('#feed-rss div').last();
          var nameMonth = [
            'Janeiro',
            'Fevereiro',
            'Março',
            'Abril',
            'Maio',
            'Junho',
            'Julho',
            'Agosto',
            'Setembro',
            'Outubro',
            'Novembro',
            'Dezembro',
          ]

          var date = new Date(v.publishedDate);
          var dateSting = (date.getDate()+' de '+nameMonth[date.getMonth()]+' de '+date.getFullYear() );
          // cont.append(v.title);
          cont.prepend('<h4 style="color: #444">'+v.title+'</h4> <span style="font-size: 12px; color: #555">('+dateSting+')<span>');

        })
        $('#feed-rss img').css('max-width', '100%');
        $('#feed-rss div').css('border-bottom', '2px dashed #444').css('padding','40px 20px');
        $('#feed-rss p').css('color', '#444');
        $('#feed-rss a').css('color', '#555').attr('target', '_blank');
      }
    )
}]);
