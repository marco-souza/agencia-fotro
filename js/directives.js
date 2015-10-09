galeriaApp.directive('onLastRepeat', function() {
  return function(scope) {
    if (scope.$last)
        scope.$emit('onRepeatLast');
  };
});
