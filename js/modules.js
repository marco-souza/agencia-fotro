var galeriaApp = angular.module('portfolioPreview', [])

.config(function($httpProvider){

    delete $httpProvider.defaults.headers.common['X-Requested-With'];
    // Resolve o problema "Request header field X-Requested-With is not allowed by Access-Control-Allow-Headers."
});;
