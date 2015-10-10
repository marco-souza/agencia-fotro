// Mostrar Preview Portfólio
galeriaApp.controller('galeriaCtrl', ['$scope','$http', function ($scope, $http) {

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
            console.log(data);
        },
        function(err) {
            console.log(err);
        }
    );

    $scope.$on("onRepeatLast", function() {
      showCase();
    })
}]);

bannerApp.controller('bannerCtrl', ['$scope', '$http', function($scope, $http) {

  // Get Images
  $scope.imgs = [];
  // $http.get('./js/images.json').then(function(res) {
  //   $scope.imgs = res.data;
  // });
  $scope.currentImg = 0;

  $scope.next = function() {
    $scope.currentImg = ($scope.currentImg+1) % $scope.imgs.length;
    console.log($scope.currentImg);
    // Change image in jquery

  };

  $scope.play = function() {
    setTimeout($scope.next, 2500);
  };

  $scope.back = function() {
    if($scope.currentImg-- < 0) $scope.currentImg = $scope.imgs.length - 1;
    console.log($scope.currentImg);

    // Change image in jquery

    // setTimeout($scope.next, 1000);
  }
}]);
