function FairCountsController($scope) {
  $scope.participants = [{name: "John Doe With A Very Very Very Very Very Long Name Seriously"}, 
                        {name: "John Doe"},
                        {name: "John Doe"}];
  
  $scope.addParticipant = function() {
    $scope.participants.push({name:$scope.participantName});
    $scope.participantName = '';
  };

  $scope.removeParticipant = function(index) {
    $scope.participants.splice( $scope.participants.indexOf(index), 1 );
  };
  
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
}