var fairCounts = angular.module('FairCounts', []);

var controllers = {};

controllers.mainController = function ($scope) {
  $scope.expenses = [
    {
      name: "New York",
      amount: 10,
      currency: "$",
      paid: false
    },
    {
      name: "Drinks at URI",
      amount: 50,
      currency: "$",
      paid: false
    },
    {
      name: "Boston housing",
      amount: 50,
      currency: "$",
      paid: false
    }
  ];
};

controllers.newGroupController = function ($scope) {
  $scope.participants = [{name: "John Doe With A Very Very Very Very Very Long Name Seriously"}, 
                        {name: "John Doe"},
                        {name: "John Doe"}];
  
  $scope.addParticipant = function() {
    if ($scope.participantName && $scope.participantName !== "") {
      $scope.participants.push({name:$scope.participantName});
      $scope.participantName = '';
    }
  };

  $scope.removeParticipant = function(index) {
    $scope.participants.splice( $scope.participants.indexOf(index), 1 );
  };
};

controllers.addExpenseController = function ($scope) {
};

fairCounts.controller(controllers);