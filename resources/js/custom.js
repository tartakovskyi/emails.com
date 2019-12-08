//Back to previous page
$('#backBtn').on('click', function(e) {
	e.preventDefault()
	window.history.back()
})

$('#saveRecipientBtn').on('click', function(e) {
	
	e.preventDefault()
	
	let recData = {}
	
	$('#recipientForm input:not([type=checkbox]),  #recipientForm select').each(function() {
		let name = $(this).attr('name')
		recData[name] = $(this).val()
	})

	$('#recipientForm [type=checkbox]').each(function() {
		let name = $(this).attr('name')
		recData[name] = ($(this).prop('checked')) ? 1 : 0;
	})

	console.log(recData)

	let response = fetch('/api/recipient/'+recData.id+'/update/', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify(recData)
	})
	.then(function(response) {
		response.json().then(function(data) {
			console.log(data)
		})
	})

})