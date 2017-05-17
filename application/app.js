<script>
  var app = angular.module("kge-projet", []);

  app.controller("affichageDiv1", function($scope) {
      $scope.hideMe1 = false;
      $scope.masquer_div1 = function(){
        $scope.hideMe1 = !$scope.hideMe1;
      }
  });

  app.controller("affichageDiv2", function($scope) {
      $scope.hideMe2 = false;
      $scope.masquer_div2 = function(){
        $scope.hideMe2 = !$scope.hideMe2;
      }
  });
</script>
