var fairCounts = angular.module('FairCounts', ['ngRoute', 'ngAnimate']);

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
  $scope.groups = [
    {id:1,
    name: "John's Birthday",
    balance: "5.03",
    expenses: [
      {name:"Presents", balance: "-10"},
      {name:"Food", balance: "13"},
      {name:"Drinks ", balance: "-4.32"},
      {name:"Balloons ", balance: "3.8"}
    ]}, 
    {id:2,
    name: "New York",
    balance: "-8.28",
    expenses: [
      {name:"Shake Shack", balance: "-10"},
      {name:"Empire State Building", balance: "13"},
      {name:"MOMA ", balance: "8.23"},
      {name:"Hot Dog ", balance: "-2.33"},
      {name:"Top of the Rock ", balance: "11.27"},
      {name:"Metropolitan ", balance: "-28.45"}
    ]}];
  
  $scope.groupsWithExpensesDisplayed = [];
  
  $scope.positiveGroupBalance = function (group) {
    if (group.balance >= 0) {
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
  
  $scope.undisplayedExpenses = function (group) {
    return group.expenses.length-2;
  }
  
  $scope.getLimit = function(group) {
    if ($scope.groupsWithExpensesDisplayed.indexOf(group.id) > -1) {
      return 99999;
    }
    return 2;
  }
  
  $scope.displayAllExpenses = function(group) {
    $scope.groupsWithExpensesDisplayed.push(group.id);
    $scope.displayButtonMoreExpenses = false;
  }
  
  $scope.showButtonMoreExpenses = function(group) {
    if ($scope.groupsWithExpensesDisplayed.indexOf(group.id) > -1) {
      return false;
    }
    return true;
  }
}

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
  
  $scope.users = [
    {id: 1, name: "Albert Doe", email:"albert.doe@gmail.com"},
    {id: 2, name: "Robert Doe", email:"robert.doe@yahoo.com"},
    {id: 23, name: "John Smith", email:"john.smith@live.com"},
    {id: 45, name: "Liza Brown", email:"liza.brown@hotmail.com"},
    {id: 66, name: "John Doe", email:"john.doe@gmail.com"},
    {id: 24, name: "Jane Doe", email:"jane.doe@gmail.com"},
  ];
  
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
    // Display a list of potential participants (all users in the db - those already participating)
    $scope.potentialParticipants = $scope.users.filter(function(element) {
      var duplicate = false;
      for (var i=0; i<$scope.participants.length; i++) {
        if (element.id === $scope.participants[i].id) {
          duplicate = true;
        }
      }
      if (!duplicate) {
        return element;
      }
    });
  };
    
  $scope.confirmAddParticipant = function () {
    if ($scope.newParticipant !== "") {
      $scope.showAddParticipantInput = false;
      $scope.participants.push({id:0, name:$scope.newParticipant, balance:0});
      $scope.newParticipant = "";
    }
  };
    
  $scope.cancelAddParticipant = function () {
    $scope.showAddParticipantInput = false;
    $scope.newParticipant = "";
  };

  $scope.addParticipantFromList = function (user) {
    $scope.showAddParticipantInput = false;
    $scope.participants.push({id:user.id, name:user.name, balance:0});
    $scope.newParticipant = "";
  };
  
  $scope.refuseDeleteParticipant = function() {
    alert("You can't remove a user that participates in at least one expense.")
  };
    
};

fairCounts.controller(controllers);