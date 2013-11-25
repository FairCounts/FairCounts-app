var fairCounts = angular.module('FairCounts', ['ngRoute']);

fairCounts.config(function ($routeProvider) {

    $routeProvider
      .when('/', {
        controller: 'mainController',
        templateUrl: './partialViews/main.html.twig'
      })
      .when('/newGroup', {
        controller: 'newGroupController',
        templateUrl: './partialViews/newGroup.html.twig'
      })
      .when('/addExpense', {
        controller: 'addExpenseController',
        templateUrl: './partialViews/addExpense.html.twig'
      })
      .when('/group', {
        controller: 'groupController',
        templateUrl: './partialViews/group.html.twig'
      });

});

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
  $scope.groupParticipants = [
    {id: 1, name: "Albert Doe"}, 
    {id: 2, name: "Robert Doe"},
    {id: 23, name: "John Smith"},
    {id: 45, name: "Liza Brown"}
  ];
  
  $scope.payers = [1];
  
  $scope.expenseParticipants = [1,2,45];
  
  $scope.isPayer = function(groupParticipant) {
    if ($scope.payers.indexOf(groupParticipant.id) !== -1) {
        return "checked";
    }
    return "";
  }
  
  $scope.isExpenseParticipant = function(groupParticipant) {
    if ($scope.expenseParticipants.indexOf(groupParticipant.id) !== -1) {
        return "checked";
    }
    return "";
  }
  
  $scope.payerClicked = function(groupParticipant) {
    if ($scope.payers.indexOf(groupParticipant.id) === -1) {
      $scope.payers.push(groupParticipant.id);
    } else {
      var index = $scope.payers.indexOf(groupParticipant.id);
      if (index >= 0) {
        $scope.payers.splice(index, 1);
      }
    }
  }
  
  $scope.participantClicked = function(groupParticipant) {
    if ($scope.expenseParticipants.indexOf(groupParticipant.id) === -1) {
      $scope.expenseParticipants.push(groupParticipant.id);
    } else {
      var index = $scope.expenseParticipants.indexOf(groupParticipant.id);
      if (index >= 0) {
        $scope.expenseParticipants.splice(index, 1);
      }
    }
  }
};

controllers.groupController = function ($scope) {
  $scope.showGroupNameInput = false;
  $scope.showAddParticipantInput = false;
  
  $scope.group = {
    id: 1,
    name: "John's Birthday",
    participants: [
      1,2,23,45
    ]
  };
  
  $scope.groupName = $scope.group.name;
  
  $scope.participants = [
    {id: 1, name: "Albert Doe", balance: -10}, 
    {id: 2, name: "Robert Doe", balance: 9.25},
    {id: 23, name: "John Smith", balance: -1.45},
    {id: 45, name: "Liza Brown", balance: -10}
  ];
  
  $scope.expenses = [
    {name: "Present", balance: -10, date: "09/28/2013", participants: [1, 2, 45, 23]},
    {name: "Food", balance: 13, date: "09/27/2013", participants: [1, 2, 45, 23]},
    {name: "Drinks", balance: -4.32, date: "09/27/2013", participants: [1, 2, 45, 23]},
    {name: "Balloons", balance: 3.8, date: "09/26/2013", participants: [1, 2, 45, 23]},
  ];
  
  $scope.positiveBalance = function (participant) {
    if (participant.balance >= 0) {
      return "positive";
    } else {
      return "negative";
    }
  };
    
  $scope.positiveExpenseBalance = function (expense) {
    if (expense.balance >= 0) {
      return "positive";
    } else {
      return "negative";
    }
  };
    
  $scope.changeGroupName = function () {
    $scope.showGroupNameInput = true;
  };
    
  $scope.confirmGroupName = function () {
    $scope.group.name = $scope.groupName;
    $scope.showGroupNameInput = false;
  };
  
  $scope.cancelGroupName = function () {
    $scope.showGroupNameInput = false;
    $scope.groupName = $scope.group.name;
  };
    
  $scope.addParticipant = function () {
    $scope.showAddParticipantInput = true;
  }
    
  $scope.confirmAddParticipant = function () {
    $scope.showAddParticipantInput = false;
    $scope.participants.push({id:0, name:$scope.newParticipant, balance:0});
    $scope.newParticipant = "";
  };
    
  $scope.cancelAddParticipant = function () {
    $scope.showAddParticipantInput = false;
    $scope.newParticipant = "";
  };
    
};

fairCounts.controller(controllers);