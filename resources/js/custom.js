//Saving recipient information changes
$('#saveRecBtn, #updateRecBtn, #delRecBtn').on('click', function(e) {
	
	e.preventDefault()

	const btnID = this.id
	
	let recData = {}
	
	$('#recipientForm input:not([type=checkbox]),  #recipientForm select').each(function() {
		let name = $(this).attr('name')
		recData[name] = $(this).val()
	})

	$('#recipientForm [type=checkbox]').each(function() {
		let name = $(this).attr('name')
		recData[name] = ($(this).prop('checked')) ? 1 : 0;
	})

	ajax(btnID, recData)

})

const ajax = (btnID, recData) => {

	let url

	switch (btnID) {

		case 'saveRecBtn':
		url = '/api/recipient/save/'
		break

		case 'updateRecBtn':
		url = '/api/recipient/save/'+recData.id+'/'
		break

		case 'delRecBtn':
		url = '/api/recipient/delete/'+recData.id+'/'

	}

	let response = fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify(recData)
	})
	.then(function(response) {
		response.json().then(function(data) {
			$('#message').addClass(data.status === 'ok' ? 'ok' : 'error').text(data.text).show()
			if (!recData.id) {
				$('#recipientForm input[type=text], #recipientForm input[type=email]').each(function () {
					$(this).val('');
				});
			}
		})
	})
}



/*FILTER FUNCTIONS*/

//Choosing items
$('.all').on('click', function() {
	let status = $(this).prop('checked')
	let id = $(this).data('target')
	$('#'+id + ' input[type="checkbox"').each(function() {
		$(this).prop('checked', status)
	})
	reloadList()
})

$('.items-set').on('click', function() {	
	let id = this.id
	$('[data-target='+id+']').prop('checked', false)
	reloadList()
})

//Forming the array of filter parameters
let filterArr = {}
const formFilterArr = () => {
	$('.items-set').each(function() {
		let paramName = $(this).data('param') 
		let paramArr = []
		$(this).find('input').each(function(){
			if ($(this).prop('checked')) paramArr.push(this.name)
		})
		filterArr[paramName] = paramArr
	})
}

//Adding 'Add new' button
const makeAddBtn = () => {
	const addBtn = '<div class="col-12 col-md-4 d-flex justify-content-end align-items-center"><a class="btn btn-success" href="/recipient/add/">Add New Recipient</a></div>'

	$('#recTable_wrapper .row:first-child .col-md-6').removeClass('col-md-6').addClass('col-md-4')
	$col = $('#recTable_wrapper .row:first-child').append(addBtn)
}

//Get recipients list with AJAX request 
const reloadList = () => {

	formFilterArr()

	$('#recTableWrap').empty()

	axios.post('/recipient/filter/', filterArr)
	.then(function (response) {

		console.log(response)

		$('#recTableWrap').append(response.data)

		$('#recTable').DataTable({
			columnDefs: [{
				orderable: false,
				className: 'select-checkbox',
				targets: 0
			},
			{
				orderable: false,
				className: 'select-checkbox',
				targets: 5
			}],
			"order": [[ 1, "asc" ]]
		})

		$('.dataTables_length').addClass('bs-select') 

		makeAddBtn()
	})

	/*$('#recTableWrap').load('/recipient/filter/', filterArr, function () {

		$('#recTable').DataTable({
			columnDefs: [{
				orderable: false,
				className: 'select-checkbox',
				targets: 0
			},
			{
				orderable: false,
				className: 'select-checkbox',
				targets: 5
			}],
			"order": [[ 1, "asc" ]]
		})

		$('.dataTables_length').addClass('bs-select') 

		makeAddBtn()
	})*/	
}




$(document).ready(function() {
	reloadList()
})

