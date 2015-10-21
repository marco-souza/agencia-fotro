// Banner
porfolioApp.controller('bannerCtrl', ['$scope', '$http', function($scope, $http) {



  // Get Images
  $scope.imgs = [];
  $http.get('./js/images.json').then(function(res) {
    $scope.imgs = res.data;
    $scope.currentImg = 0;
  });

  $scope.$on("onRepeatLast", function() {

    setTimeout(function() {

			$( "."+$scope.imgs[ $scope.currentImg ].class.toString()).show("slide", {direction: "right"}, "slow");

			$scope.play();
		}, 1);

  })

  $scope.next = function() {
    var newImg = ($scope.currentImg+1) % $scope.imgs.length;
    // Change image in jquery
    // Oculta imagem atual
    $( "."+$scope.imgs[ $scope.currentImg ].class.toString() ).hide("slide",
		{direction: "left"}, 1500);
    // Mostra nova imagem
    $( "."+$scope.imgs[ newImg ].class.toString() ).show("slide", {direction:
		"right"}, 1500);


    // Change currentImg
    $scope.currentImg = newImg;

  };

  $scope.play = function() {
    setInterval(function() {
			document.getElementsByClassName("arrow-left")[0].click();
		}, 5000);
  };

  $scope.back = function() {

    var newImg = ($scope.currentImg > 0)? $scope.currentImg - 1 :  $scope.imgs.length - 1 ;
    // Change image in jquery
    // Oculta imagem atual
    $( "."+$scope.imgs[ $scope.currentImg ].class.toString() ).hide("slide", {direction: "right"}, "slow");
    // Mostra nova imagem
    $( "."+$scope.imgs[ newImg ].class.toString() ).show("slide", {direction: "left"}, "slow");


    // Change currentImg
    $scope.currentImg = newImg;
  }
}]);

// Galeria
porfolioApp.controller('galeriaCtrl', ['$scope','$http', function ($scope, $http) {

    $http({
        method: 'GET',
        url: 'https://api.flickr.com/services/rest',
        params: {
            method: 'flickr.photosets.getList',
            api_key: 'af52c0a54446e916480f184e72de1c8a',
            user_id: '134716620@N02',
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

    $scope.$on("onRepeatLast", function() {
      showCase();
    })
}]);
