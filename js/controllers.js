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
