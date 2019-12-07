//Back to previous page
$('#backBtn').on('click', function(e) {
	e.preventDefault()
	window.history.back()
})

$('#saveRecipientBtn').on('click', function(e) {
	
	e.preventDefault()
	
	let recData = {}
	
	$('#recipientForm [type=text], #recipientForm [type=email],  #recipientForm select').each(function() {
		let name = $(this).attr('name')
		recData[name] = $(this).val()
	})

	$('#recipientForm [type=checkbox]').each(function() {
		let name = $(this).attr('name')
		recData[name] = ($(this).prop('checked')) ? 1 : 0;
	})

	/*let response = fetch('ajax.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify(prodData)
	})
	.then(function(response) {
		response.json().then(function(data) {
			changeTotal(data)
		})
	})*/

	console.log(recData)
})