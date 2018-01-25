(function($) {
  "use strict"; // Start of use strict

	$( "#donateForm" ).submit(function( event ) {
		save($(this)[0]);
	    event.preventDefault();
	});

	function save(form){
		var formEles = form.elements;
		var NRIC = formEles.NRIC.value;
		var email = formEles.email.value;
		var birthDate = formEles.birthDate.value;
		var location = formEles.location.value;
		var amount = parseInt(formEles.amount.value);

		var newRecord = {
			NRIC:NRIC,
			email:email,
			birthDate:birthDate,
			location:location,
			amount:amount
		};

		//donateRecord [newRecord1,newRecord2,newRecord3]
		_updateRecord(newRecord);

		$( document ).trigger( "update3DPie"); 
		
	}

	function _updateRecord(newRecord){
		var donateRecord = localStorage.donateRecord;
		if (donateRecord) {
			var recordArray = JSON.parse(donateRecord);
			var isExist = false;
			for(var i=0;i<=recordArray.length - 1;i++){
				if(recordArray[i].NRIC == newRecord.NRIC){
					var oldAmount = parseInt(recordArray[i].amount);
					recordArray[i] = newRecord;
					recordArray[i].amount += oldAmount;
					isExist = true;
					break;
				}
			}

			if(!isExist){
				recordArray.push(newRecord);
			}

           
            localStorage.donateRecord = JSON.stringify(recordArray);
        } else {
            localStorage.donateRecord = JSON.stringify([newRecord]);
        }

        console.log("donateRecord : " + localStorage.donateRecord);
	}

})(jQuery); // End of use strict