  var app = angular.module("kge-project", []);

  app.controller("affichageDiv", function($scope) {
      $scope.hideMe1 = false;
      $scope.hideMe2 = false;
      $scope.masquer_div1 = function(){
        $scope.hideMe1 = !$scope.hideMe1;
      }
      $scope.masquer_div2 = function(){
        $scope.hideMe2 = !$scope.hideMe2;
      }
      $scope.fermer_div2 = function(){
        $scope.hideMe2 = false;
      }
      $scope.fermer_div1 = function(){
        $scope.hideMe1 = false;
      }

  });
