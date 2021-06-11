// Code goes here

var app = angular.module('myApp',
	[]);

app.controller('countryCtrl', [
	'$scope',
	function($scope) {

		$scope.countriesWithPhoneCode = [
		{
			"name": "Belarus",
			"dial_code": "+375",
			"code": "BY"
		},
		{
			"name": "England",
			"dial_code": "+375",
			"code": "EN"
		},
		{
			"name": "Russia",
			"dial_code": "+7",
			"code": "EN"
		},
		{
			"name": "Armenia",
			"dial_code": "+374",
			"code": "AR"
		},
		{
			"name": "Germany",
			"dial_code": "+49",
			"code": "GE"
		},
		{
			"name": "Italy",
			"dial_code": "+39",
			"code": "IT"
		},
		{
			"name": "Kazakhstan",
			"dial_code": "+7",
			"code": "KZ"
		},
		{
			"name": "Kyrgyzstan",
			"dial_code": "+996",
			"code": "KG"
		},
		{
			"name": "Ukraine",
			"dial_code": "+380",
			"code": "UK"
		},
		{
			"name": "Moldova",
			"dial_code": "+373",
			"code": "MD"
		},
		{
			"name": "Tajikistan",
			"dial_code": "+992",
			"code": "TJ"
		},
		{
			"name": "Turkmenistan",
			"dial_code": "+993",
			"code": "TK"
		},
		{
			"name": "France",
			"dial_code": "+33",
			"code": "FR"
		}
		];

	}]);