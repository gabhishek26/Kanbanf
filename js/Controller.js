function Cntrl ($scope,$location) {
				alert("this happened")

        $scope.changeView = function(view){
			alert(view);
            $location.path(view); // path not hash
			alert("this happened")
        }
    }